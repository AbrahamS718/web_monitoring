<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HardwareManagemen extends Controller
{
    public function vesselView(Request $request)
    {
        if ($request['index'] == 'view') {
            $egi_vessel = DB::table('egi_vessel')->get();
            $unit_vessel = DB::table('unit_vessel')->get();
            $vessel = DB::table('vessel')->get();

            return view('admin/vesselView', [
                'egi_vessel' => $egi_vessel,
                'unit_vessel' => $unit_vessel,
                'vessel' => $vessel,
            ]);
        } elseif ($request['index'] == 'delete') {
            $status = DB::table($_GET['action'])->where('id', $_GET['id'])->delete();

            if ($status) {
                return redirect()->route('admin.vesselview.index', ['index' => 'view']);
            }
        }
    }

    public function vesselInsert(Request $request)
    {
        if ($request['action'] == 'vessel') {
            $status = DB::table($request['action'])->insert(['egi_vessel' => $request['egi_vessel'], 'unit_vessel' => $request['unit_vessel']]);

            if ($status) {
                return redirect()->route('admin.vesselview.index', ['index' => 'view']);
            }
        } else {
            $status = DB::table($request['action'])->insert(['name' => $request['name']]);

            if ($status) {
                return redirect()->route('admin.vesselview.index', ['index' => 'view']);
            }
        }
    }

    public function pmView(Request $request)
    {
        if ($request['index'] == 'view') {
            $egi_pm = DB::table('egi_pm')->get();
            $unit_pm = DB::table('unit_pm')->get();
            $pm = DB::table('pm')->get();

            return view('admin/pmView', [
                'egi_pm' => $egi_pm,
                'unit_pm' => $unit_pm,
                'pm' => $pm,
            ]);
        } elseif ($request['index'] == 'delete') {
            $status = DB::table($_GET['action'])->where('id', $_GET['id'])->delete();

            if ($status) {
                return redirect()->route('admin.pmview.index', ['index' => 'view']);
            }
        }
    }

    public function pmInsert(Request $request)
    {
        if ($request['action'] == 'pm') {
            $status = DB::table($request['action'])->insert(['egi_pm' => $request['egi_pm'], 'unit_pm' => $request['unit_pm']]);

            if ($status) {
                return redirect()->route('admin.pmview.index', ['index' => 'view']);
            }
        } else {
            $status = DB::table($request['action'])->insert(['name' => $request['name']]);

            if ($status) {
                return redirect()->route('admin.pmview.index', ['index' => 'view']);
            }
        }
    }
}
