<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class connectP2V extends Controller
{
    public function viewConnectP2V()
    {
        $pm = DB::table('pm')->get();
        $vessel = DB::table('vessel')->get();

        return view('admin.connectP2V', [
            'pm' => $pm,
            'vessel' => $vessel,
        ]);
    }

    public function searchPM($temp)
    {
        $temp_result = [];
        foreach ($temp as $data) {
            $cache = [
                'id' => $data->id,
                'egi_vessel' => DB::table('vessel')->select('egi_vessel')->where('id', $data->vessel)->get()[0]->egi_vessel,
                'unit_vessel' => DB::table('vessel')->select('unit_vessel')->where('id', $data->vessel)->get()[0]->unit_vessel,
                'egi_pm' => DB::table('pm')->select('egi_pm')->where('id', $data->pm)->get()[0]->egi_pm,
                'unit_pm' => DB::table('pm')->select('unit_pm')->where('id', $data->pm)->get()[0]->unit_pm,
                'location' => $data->location,
                'hm_pm' => $data->hm_pm,
                'hm_vessel' => $data->hm_vessel
            ];

            $temp_result[] = $cache;
        }

        return $temp_result;
    }
    public function viewDailyCheck()
    {
        $connectP2V = $this->searchPM(DB::table('connect_p2v')->select(['id', 'vessel', 'pm', 'location', 'hm_pm', 'hm_vessel'])->get());

        return view('admin/dailyCheck', [
            'connectP2V' => $connectP2V,
        ]);
    }

    public function insertConnectP2V(Request $request)
    {
        $file = $request->file('bukti_foto');
        $randomId = mt_rand(1000, 9999);
        $id_orders = $randomId . '_' .  time();
        $filename = $id_orders . '.' . $file->getClientOriginalExtension();

        // Menyimpan file
        $path = $file->storeAs('bukti_foto', $filename, 'public');

        $data = [
            'location' => $request['location'],
            'pm' => $request['pm'],
            'vessel' => $request['vessel'],
            'hm_pm' => $request['hm_pm'],
            'hm_vessel' => $request['hm_vessel'],
            'bukti_foto' => $path,
            'created_at' => $request['created_at'],
            'pic' => $request['pic'],
            'fifthwheel_001' => $request['fifthwheel_001'],
            'fifthwheel_002' => $request['fifthwheel_002'],
            'fifthwheel_003' => $request['fifthwheel_003'],
            'fifthwheel_004' => $request['fifthwheel_004'],
            'fifthwheel_001_mark' => $request['fifthwheel_001_mark'],
            'fifthwheel_002_mark' => $request['fifthwheel_002_mark'],
            'fifthwheel_003_mark' => $request['fifthwheel_003_mark'],
            'fifthwheel_004_mark' => $request['fifthwheel_004_mark'],

            'brakesystem_001' => $request['brakesystem_001'],
            'brakesystem_002' => $request['brakesystem_002'],
            'brakesystem_003' => $request['brakesystem_003'],
            'brakesystem_004' => $request['brakesystem_004'],
            'brakesystem_005' => $request['brakesystem_005'],
            'brakesystem_006' => $request['brakesystem_006'],
            'brakesystem_007' => $request['brakesystem_007'],
            'brakesystem_001_mark' => $request['brakesystem_001_mark'],
            'brakesystem_002_mark' => $request['brakesystem_002_mark'],
            'brakesystem_003_mark' => $request['brakesystem_003_mark'],
            'brakesystem_004_mark' => $request['brakesystem_004_mark'],
            'brakesystem_005_mark' => $request['brakesystem_005_mark'],
            'brakesystem_006_mark' => $request['brakesystem_006_mark'],
            'brakesystem_007_mark' => $request['brakesystem_007_mark'],

            'dumpingtest_001' => $request['dumpingtest_001'],
            'dumpingtest_002' => $request['dumpingtest_002'],
            'dumpingtest_003' => $request['dumpingtest_003'],
            'dumpingtest_004' => $request['dumpingtest_004'],
            'dumpingtest_005' => $request['dumpingtest_005'],
            'dumpingtest_001_mark' => $request['dumpingtest_001_mark'],
            'dumpingtest_002_mark' => $request['dumpingtest_002_mark'],
            'dumpingtest_003_mark' => $request['dumpingtest_003_mark'],
            'dumpingtest_004_mark' => $request['dumpingtest_004_mark'],
            'dumpingtest_005_mark' => $request['dumpingtest_005_mark'],

            'electricalsystem_001' => $request['electricalsystem_001'],
            'electricalsystem_002' => $request['electricalsystem_002'],
            'electricalsystem_003' => $request['electricalsystem_003'],
            'electricalsystem_004' => $request['electricalsystem_004'],
            'electricalsystem_005' => $request['electricalsystem_005'],
            'electricalsystem_001_mark' => $request['electricalsystem_001_mark'],
            'electricalsystem_002_mark' => $request['electricalsystem_002_mark'],
            'electricalsystem_003_mark' => $request['electricalsystem_003_mark'],
            'electricalsystem_004_mark' => $request['electricalsystem_004_mark'],
            'electricalsystem_005_mark' => $request['electricalsystem_005_mark'],

            'safetyeq_001' => $request['safetyeq_001'],
            'safetyeq_002' => $request['safetyeq_002'],
            'safetyeq_003' => $request['safetyeq_003'],
            'safetyeq_004' => $request['safetyeq_004'],
            'safetyeq_005' => $request['safetyeq_005'],
            'safetyeq_001_mark' => $request['safetyeq_001_mark'],
            'safetyeq_002_mark' => $request['safetyeq_002_mark'],
            'safetyeq_003_mark' => $request['safetyeq_003_mark'],
            'safetyeq_004_mark' => $request['safetyeq_004_mark'],
            'safetyeq_005_mark' => $request['safetyeq_005_mark'],
        ];

        $status = DB::table('connect_p2v')->insert($data);

        if ($status) {
            return redirect()->route('admin.connectP2V');
        }
    }

    public function insertDailyCheck(Request $request)
    {
        $data = [
            'id_pv' => $request['id_pv'],
            'bays' => $request['bays'],
            'created_at' => $request['created_at'],
            'pic' => $request['pic'],
            'status' => $request['status'],
            'keterangan' => $request['keterangan'],

            'v1_l1' => $request['v1_l1'],
            'v1_r1' => $request['v1_r1'],
            'v1_l2' => $request['v1_l2'],
            'v1_r2' => $request['v1_r2'],
            'v1_l3' => $request['v1_l3'],
            'v1_r3' => $request['v1_r3'],
            'v1_l4' => $request['v1_l4'],
            'v1_r4' => $request['v1_r4'],

            'v2_l1' => $request['v2_l1'],
            'v2_r1' => $request['v2_r1'],
            'v2_l2' => $request['v2_l2'],
            'v2_r2' => $request['v2_r2'],
            'v2_l3' => $request['v2_l3'],
            'v2_r3' => $request['v2_r3'],
            'v2_l4' => $request['v2_l4'],
            'v2_r4' => $request['v2_r4'],

            'd_l1' => $request['d_l1'],
            'd_r1' => $request['d_r1'],
            'd_l2' => $request['d_l2'],
            'd_r2' => $request['d_r2'],
            'd_l3' => $request['d_l3'],
            'd_r3' => $request['d_r3'],
        ];

        $status = DB::table('daily_check')->insert($data);

        if ($status) {
            return redirect()->route('admin.dailycheck');
        }
    }
}
