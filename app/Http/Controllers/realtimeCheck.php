<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class realtimeCheck extends Controller
{
    // public function searchLatestData($temp)
    // {
    //     $latestData = [];

    //     foreach ($temp as $item) {
    //         if (!isset($latestData[$item->id_pv]) || $item->created_at > $latestData[$item->id_pv]->created_at) {
    //             $latestData[$item->id_pv] = $item;
    //         }
    //     }

    //     return $latestData;
    // }
    public function searchLatestData($temp, $list)
    {
        $latestData = [];

        foreach ($list as $data) {
            $latestData[$data->id] = $data;
        }

        foreach ($temp as $item) {
            if (!isset($latestData[$item->id_pv]->created_at) || $item->created_at > $latestData[$item->id_pv]->created_at) {
                $latestData[$item->id_pv] = $item;
            }
        }

        // foreach ($latestData as $coba) {
        //     var_dump($coba);
        //     echo "<hr>";
        // }
        return $latestData;
    }
    public function checkView()
    {
        $temp = DB::table('connect_p2v')
            ->join(DB::raw('(SELECT id_pv, status, created_at FROM daily_check ORDER BY created_at DESC) as latest_data '), function ($join) {
                $join->on('connect_p2v.id', '=', 'latest_data.id_pv');
            })
            ->join('vessel', 'connect_p2v.vessel', '=', 'vessel.id')
            ->join('pm', 'connect_p2v.pm', '=', 'pm.id')
            ->select('connect_p2v.id', 'connect_p2v.created_at', 'vessel.egi_vessel', 'vessel.unit_vessel', 'pm.egi_pm', 'pm.unit_pm', 'latest_data.*')
            ->get();
        $list = DB::table('connect_p2v')
            ->join('vessel', 'connect_p2v.vessel', '=', 'vessel.id')
            ->join('pm', 'connect_p2v.pm', '=', 'pm.id')
            ->select('connect_p2v.id', 'vessel.egi_vessel', 'vessel.unit_vessel', 'pm.egi_pm', 'pm.unit_pm')
            ->get();

        $data = $this->searchLatestData($temp, $list);

        // foreach ($temp as $data) {
        //     var_dump($data);
        //     echo "<hr>";
        // }

        return view('admin/realtimecheck', [
            'view' => $data,
        ]);
    }

    public function deleteCheckView(Request $request)
    {
        DB::table('daily_check')->where('id_pv', $request['index'])->delete();
        DB::table('connect_p2v')->where('id', $request['index'])->delete();

        return redirect()->route('admin.checkView');
    }

    public function detailInfo(Request $request)
    {
        if ($request['index'] == 'view') {
            $id = $_GET['id'];

            $connect_p2v = DB::table('connect_p2v')->where('id', $id)->get();
            $pm = DB::table('pm')->where('id', $connect_p2v[0]->PM)->get();
            $vessel = DB::table('vessel')->where('id', $connect_p2v[0]->vessel)->get();

            $daily_check = [];
            $days = [];
            $v1_l1 = [];
            $v1_r1 = [];
            $v1_l2 = [];
            $v1_r2 = [];
            $v1_l3 = [];
            $v1_r3 = [];
            $v1_l4 = [];
            $v1_r4 = [];
            $d_l1 = [];
            $d_r1 = [];
            $d_l2 = [];
            $d_r2 = [];
            $d_l3 = [];
            $d_r3 = [];
            $v2_l1 = [];
            $v2_r1 = [];
            $v2_l2 = [];
            $v2_r2 = [];
            $v2_l3 = [];
            $v2_r3 = [];
            $v2_l4 = [];
            $v2_r4 = [];
            $keterangan = [];
            $status = [];
            $bays = [];
            $id_dailycheck = [];
            if (isset($_GET['month']) && isset($_GET['year'])) {
                $daily_check = DB::table('daily_check')
                    ->where('id_pv', $id)
                    ->whereMonth('created_at', $_GET['month'])
                    ->whereYear('created_at', $_GET['year'])
                    ->get();

                foreach ($daily_check as $data) {
                    $days[] = DateTime::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d');
                    $v1_l1[] = $data->v1_l1;
                    $v1_r1[] = $data->v1_r1;
                    $v1_l2[] = $data->v1_l2;
                    $v1_r2[] = $data->v1_r2;
                    $v1_l3[] = $data->v1_l3;
                    $v1_r3[] = $data->v1_r3;
                    $v1_l4[] = $data->v1_l4;
                    $v1_r4[] = $data->v1_r4;
                    $d_l1[] = $data->d_l1;
                    $d_r1[] = $data->d_r1;
                    $d_l2[] = $data->d_l2;
                    $d_r2[] = $data->d_r2;
                    $d_l3[] = $data->d_l3;
                    $d_r3[] = $data->d_r3;
                    $v2_l1[] = $data->v2_l1;
                    $v2_r1[] = $data->v2_r1;
                    $v2_l2[] = $data->v2_l2;
                    $v2_r2[] = $data->v2_r2;
                    $v2_l3[] = $data->v2_l3;
                    $v2_r3[] = $data->v2_r3;
                    $v2_l4[] = $data->v2_l4;
                    $v2_r4[] = $data->v2_r4;
                    $keterangan[] = $data->keterangan;
                    $status[] = $data->status;
                    $bays[] = $data->bays;
                    $id_dailycheck[] = $data->id;
                }
            } else {
                $daily_check = null;
            }

            // foreach ($days as $data) {
            //     // var_dump(DateTime::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d'));
            //     $data;
            //     echo "<hr>";
            // }

            return view('admin/moreDetails', [
                'connect_p2v' => $connect_p2v,
                'pm' => $pm,
                'vessel' => $vessel,

                'daily_check' => $daily_check,
                'days' => $days,
                'v1_l1' => $v1_l1,
                'v1_r1' => $v1_r1,
                'v1_l2' => $v1_l2,
                'v1_r2' => $v1_r2,
                'v1_l3' => $v1_l3,
                'v1_r3' => $v1_r3,
                'v1_l4' => $v1_l4,
                'v1_r4' => $v1_r4,
                'd_l1' => $d_l1,
                'd_r1' => $d_r1,
                'd_l2' => $d_l2,
                'd_r2' => $d_r2,
                'd_l3' => $d_l3,
                'd_r3' => $d_r3,
                'v2_l1' => $v2_l1,
                'v2_r1' => $v2_r1,
                'v2_l2' => $v2_l2,
                'v2_r2' => $v2_r2,
                'v2_l3' => $v2_l3,
                'v2_r3' => $v2_r3,
                'v2_l4' => $v2_l4,
                'v2_r4' => $v2_r4,
                'keterangan' => $keterangan,
                'status' => $status,
                'bays' => $bays,
                'id' => $id_dailycheck,
            ]);
        } elseif ($request['index'] == 'delete') {
            DB::table('daily_check')->where('id', $_GET['id_dailycheck'])->delete();

            return redirect()->route('admin.detailInfo.index', [
                'index' => 'view',
                'id' => $_GET['id'],
                'month' => $_GET['month'],
                'year' => $_GET['year'],
            ]);
        }
    }
}
