<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function searchLatestData($temp)
    {
        $latestData = [];

        foreach ($temp as $item) {
            if (!isset($latestData[$item->id_pv]) || $item->created_at > $latestData[$item->id_pv]->created_at) {
                $latestData[$item->id_pv] = $item;
            }
        }

        return $latestData;
    }
    public function grafikVessel($index, $temp)
    {
        $vesselData = [];
        $i = 0;
        foreach ($index as $list) {
            $vesselData[$list->name] = [
                'id' => $i++,
                'vessel' => $list->name,
                'rfu' => 0,
                'total' => 0,
            ];
        }
        foreach ($temp as $data) {
            $vesselData[$data->egi_vessel]['total']++;
            if ($data->status == 'rfu') {
                $vesselData[$data->egi_vessel]['rfu']++;
            }
        }

        // var_dump($vesselData);
        return $vesselData;
    }
    public function index()
    {
        $temp = DB::table('connect_p2v')
            ->join(DB::raw('(SELECT id_pv, status, created_at FROM daily_check ORDER BY created_at DESC) as latest_data'), function ($join) {
                $join->on('connect_p2v.id', '=', 'latest_data.id_pv');
            })
            ->join('vessel', 'connect_p2v.vessel', '=', 'vessel.id')
            ->select('connect_p2v.id', 'latest_data.id_pv', 'latest_data.created_at', 'latest_data.status', 'vessel.egi_vessel')
            ->get();

        $egi_vessel = DB::table('egi_vessel')->get();

        $latestdata = $this->searchLatestData($temp);

        $rfu = 0;
        $breakdown = 0;
        $vessel_waiting_prime_mover = 0;
        $prime_mover_waiting_vessel = 0;
        $service_vessel = 0;

        foreach ($latestdata as $data) {
            switch ($data->status) {
                case 'rfu':
                    $rfu++;
                    break;
                case 'breakdown':
                    $breakdown++;
                    break;
                case 'vessel waiting prime mover':
                    $vessel_waiting_prime_mover++;
                    break;
                case 'prime mover waiting vessel':
                    $prime_mover_waiting_vessel++;
                    break;
                case 'service vessel':
                    $service_vessel++;
                    break;
            }
        }

        // $this->grafikVessel($egi_vessel, $latestdata);
        // var_dump(Auth::user());
        return view('admin.dashboard', [
            'rfu' => $rfu,
            'breakdown' => $breakdown,
            'vessel_waiting_prime_mover' => $vessel_waiting_prime_mover,
            'prime_mover_waiting_vessel' => $prime_mover_waiting_vessel,
            'service_vessel' => $service_vessel,

            // Grafic
            // 'egi_vessel' => $egi_vessel,
            'grafik_vessel' => $this->grafikVessel($egi_vessel, $latestdata),
        ]);
    }
}
