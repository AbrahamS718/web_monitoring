@extends('components.layouts.app')

@section('content')
@livewire('adminlte.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Connect PM to Vessel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Connect PM to Vessel</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Connect Prime Mover to Vessel</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.insertConnectP2V') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="location" class="form-control" placeholder="Location">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Prime Mover</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" name="pm">
                                            <option selected>Select Prime Mover</option>
                                            @foreach ($pm as $data)
                                            <option value="{{ $data->id }}">{{ $data->egi_pm . " | " .  $data->unit_pm }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Vessel</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" name="vessel">
                                            <option selected>Select Vessel</option>
                                            @foreach ($vessel as $data)
                                            <option value="{{ $data->id }}">{{ $data->egi_vessel . " | " .  $data->unit_vessel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">HM Prime Mover</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="hm_pm" class="form-control" placeholder="HM Prime Mover">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">HM Vessel</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="hm_vessel" class="form-control" placeholder="hm_vessel">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Datetime Input</label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" name="created_at" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PIC</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="pic" class="form-control" placeholder="Lists of PIC">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Photo Evidence</label>
                                    <div class="custom-file col-sm-10">
                                        <input type="file" name="bukti_foto" class="custom-file-input" id="bukti_foto" onchange="updateFileName()">
                                        <label class="custom-file-label" for="bukti_foto">Choose file...</label>
                                    </div>
                                </div>

                                <!-- Fifth Wheel -->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Fifth Wheel</th>
                                                <th colspan="4">Condition</th>
                                                <th rowspan="2">Remark</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Item to Check</th>
                                                <th colspan="2">Check Point</th>
                                                <th>Good</th>
                                                <th>Bad</th>
                                                <th>Improv</th>
                                                <th>After Repair</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Locking Bar</td>
                                                <td colspan="2">Condition, Position</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_001" id="fifthwheel_001_good" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_001_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_001" id="fifthwheel_001_bad" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_001_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_001" id="fifthwheel_001_improv" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_001_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_001" id="fifthwheel_001_repaired" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_001_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="fifthwheel_001_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Handle & Lock</td>
                                                <td colspan="2">Condition, Position</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_002" id="fifthwheel_002_good" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_002_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_002" id="fifthwheel_002_bad" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_002_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_002" id="fifthwheel_002_improv" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_002_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_002" id="fifthwheel_002_repaired" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_002_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="fifthwheel_002_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Lock Jaw</td>
                                                <td colspan="2">Condition, Position</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_003" id="fifthwheel_003_good" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_003_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_003" id="fifthwheel_003_bad" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_003_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_003" id="fifthwheel_003_improv" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_003_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_003" id="fifthwheel_003_repaired" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_003_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="fifthwheel_003_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Tension Spring</td>
                                                <td colspan="2">Condition, Position</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_004" id="fifthwheel_004_good" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_004_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_004" id="fifthwheel_004_bad" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_004_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_004" id="fifthwheel_004_improv" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_004_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="fifthwheel_004" id="fifthwheel_004_repaired" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="fifthwheel_004_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="fifthwheel_004_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->

                                <!-- Brake System -->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Brake System</th>
                                                <th colspan="4">Condition</th>
                                                <th rowspan="2">Remark</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Item to Check</th>
                                                <th colspan="2">Check Point</th>
                                                <th>Good</th>
                                                <th>Bad</th>
                                                <th>Improv</th>
                                                <th>After Repair</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Air Pressure System</td>
                                                <td colspan="2">Leaks, Gauge Position (Min.9 Bar)</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_001_good" name="brakesystem_001" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_001_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_001_bad" name="brakesystem_001" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_001_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_001_improv" name="brakesystem_001" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_001_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_001_repaired" name="brakesystem_001" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_001_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="brakesystem_001_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-warning">Hose Control to Vessel</td>
                                                <td colspan="2">Leaks, Damage, Unusual Noise</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_002_good" name="brakesystem_002" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_002_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_002_bad" name="brakesystem_002" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_002_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_002_improv" name="brakesystem_002" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_002_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_002_repaired" name="brakesystem_002" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_002_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="brakesystem_002_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-danger">Hose Supply to Vessel</td>
                                                <td colspan="2">Leaks, Damage, Unusual Noise</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_003_good" name="brakesystem_003" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_003_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_003_bad" name="brakesystem_003" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_003_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_003_improv" name="brakesystem_003" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_003_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_003_repaired" name="brakesystem_003" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_003_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="brakesystem_003_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Coupler Connection</td>
                                                <td colspan="2">Damage, Unusual Noise</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_004_good" name="brakesystem_004" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_004_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_004_bad" name="brakesystem_004" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_004_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_004_improv" name="brakesystem_004" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_004_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_004_repaired" name="brakesystem_004" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_004_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="brakesystem_004_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Brake Valve PM & Vessel</td>
                                                <td colspan="2">Leaks, Damage, Unusual Noise</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_005_good" name="brakesystem_005" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_005_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_005_bad" name="brakesystem_005" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_005_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_005_improv" name="brakesystem_005" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_005_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_005_repaired" name="brakesystem_005" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_005_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="brakesystem_005_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Slack Adjuster</td>
                                                <td colspan="2">Function, Condition</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_006_good" name="brakesystem_006" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_006_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_006_bad" name="brakesystem_006" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_006_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_006_improv" name="brakesystem_006" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_006_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_006_repaired" name="brakesystem_006" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_006_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="brakesystem_006_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Hose & Chamber Brake</td>
                                                <td colspan="2">Leaks, Damage, Unusual Noise</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_007_good" name="brakesystem_007" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_007_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_007_bad" name="brakesystem_007" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_007_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_007_improv" name="brakesystem_007" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_007_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="brakesystem_007_repaired" name="brakesystem_007" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="brakesystem_007_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="brakesystem_007_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->

                                <!-- Dumping  Test-->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Dumping Test</th>
                                                <th colspan="4">Condition</th>
                                                <th rowspan="2">Remark</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Item to Check</th>
                                                <th colspan="2">Check Point</th>
                                                <th>Good</th>
                                                <th>Bad</th>
                                                <th>Improv</th>
                                                <th>After Repair</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Pneumatic Hose to Control Valve</td>
                                                <td colspan="2">Leaks, Twist, Folded, Connection</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_001_good" name="dumpingtest_001" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_001_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_001_bad" name="dumpingtest_001" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_001_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_001_improv" name="dumpingtest_001" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_001_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_001_repaired" name="dumpingtest_001" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_001_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="dumpingtest_001_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">PTO</td>
                                                <td colspan="2">Leaks, Damage, Unusual Noise</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_002_good" name="dumpingtest_002" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_002_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_002_bad" name="dumpingtest_002" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_002_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_002_improv" name="dumpingtest_002" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_002_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_002_repaired" name="dumpingtest_002" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_002_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="dumpingtest_002_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Hydraulic Hose PM</td>
                                                <td colspan="2">Damage, Leaks, Loose</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_003_good" name="dumpingtest_003" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_003_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_003_bad" name="dumpingtest_003" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_003_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_003_improv" name="dumpingtest_003" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_003_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_003_repaired" name="dumpingtest_003" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_003_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="dumpingtest_003_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Hydraulic Hose Vessel</td>
                                                <td colspan="2">Damage, Leaks, Loose</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_004_good" name="dumpingtest_004" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_004_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_004_bad" name="dumpingtest_004" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_004_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_004_improv" name="dumpingtest_004" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_004_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_004_repaired" name="dumpingtest_004" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_004_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="dumpingtest_004_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Joystick Mechanisme</td>
                                                <td colspan="2">Good Function</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_005_good" name="dumpingtest_005" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_005_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_005_bad" name="dumpingtest_005" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_005_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_005_improv" name="dumpingtest_005" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_005_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="dumpingtest_005_repaired" name="dumpingtest_005" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="dumpingtest_005_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="dumpingtest_005_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->

                                <!-- Electrical System -->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Electrical System</th>
                                                <th colspan="4">Condition</th>
                                                <th rowspan="2">Remark</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Item to Check</th>
                                                <th colspan="2">Check Point</th>
                                                <th>Good</th>
                                                <th>Bad</th>
                                                <th>Improv</th>
                                                <th>After Repair</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Electrical Connection to Vessel</td>
                                                <td colspan="2">Damage, Loose</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_001_good" name="electricalsystem_001" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_001_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_001_bad" name="electricalsystem_001" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_001_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_001_improv" name="electricalsystem_001" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_001_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_001_repaired" name="electricalsystem_001" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_001_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="electricalsystem_001_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Position lamp Vs 1 & Vs 2</td>
                                                <td colspan="2">OFF, Damage, Loose</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_002_good" name="electricalsystem_002" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_002_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_002_bad" name="electricalsystem_002" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_002_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_002_improv" name="electricalsystem_002" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_002_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_002_repaired" name="electricalsystem_002" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_002_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="electricalsystem_002_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Sign Lamp Vs 1 & Vs 2</td>
                                                <td colspan="2">OFF, Damage, Loose</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_003_good" name="electricalsystem_003" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_003_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_003_bad" name="electricalsystem_003" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_003_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_003_improv" name="electricalsystem_003" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_003_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_003_repaired" name="electricalsystem_003" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_003_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="electricalsystem_003_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Brake Lamp Vs 1 & Vs 2</td>
                                                <td colspan="2">OFF, Damage, Loose</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_004_good" name="electricalsystem_004" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_004_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_004_bad" name="electricalsystem_004" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_004_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_004_improv" name="electricalsystem_004" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_004_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_004_repaired" name="electricalsystem_004" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_004_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="electricalsystem_004_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Auxiliary Brake Lamp Vs 2 (Mata Dewa)</td>
                                                <td colspan="2">OFF, Damage, Loose</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_005_good" name="electricalsystem_005" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_005_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_005_bad" name="electricalsystem_005" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_005_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_005_improv" name="electricalsystem_005" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_005_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="electricalsystem_005_repaired" name="electricalsystem_005" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="electricalsystem_005_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="electricalsystem_005_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->

                                <!-- Safety Equipment -->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Safety Equipment</th>
                                                <th colspan="4">Condition</th>
                                                <th rowspan="2">Remark</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Item to Check</th>
                                                <th colspan="2">Check Point</th>
                                                <th>Good</th>
                                                <th>Bad</th>
                                                <th>Improv</th>
                                                <th>After Repair</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Wheel Block</td>
                                                <td colspan="2">Condition, Position</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_001_good" name="safetyeq_001" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_001_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_001_bad" name="safetyeq_001" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_001_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_001_improv" name="safetyeq_001" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_001_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_001_repaired" name="safetyeq_001" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_001_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="safetyeq_001_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Safety Cone</td>
                                                <td colspan="2">Condition, Position</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_002_good" name="safetyeq_002" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_002_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_002_bad" name="safetyeq_002" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_002_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_002_improv" name="safetyeq_002" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_002_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_002_repaired" name="safetyeq_002" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_002_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="safetyeq_002_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Bushing Towing</td>
                                                <td colspan="2">Worn, Condition</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_003_good" name="safetyeq_003" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_003_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_003_bad" name="safetyeq_003" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_003_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_003_improv" name="safetyeq_003" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_003_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_003_repaired" name="safetyeq_003" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_003_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="safetyeq_003_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Draw Bar</td>
                                                <td colspan="2">Damage, Bending, Broken</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_004_good" name="safetyeq_004" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_004_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_004_bad" name="safetyeq_004" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_004_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_004_improv" name="safetyeq_004" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_004_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_004_repaired" name="safetyeq_004" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_004_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="safetyeq_004_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Safety Sling</td>
                                                <td colspan="2">Damage, Condition</td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_005_good" name="safetyeq_005" value="good" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_005_good"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_005_bad" name="safetyeq_005" value="bad" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_005_bad"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_005_improv" name="safetyeq_005" value="improv" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_005_improv"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="safetyeq_005_repaired" name="safetyeq_005" value="repaired" class="custom-control-input">
                                                        <label class="custom-control-label" for="safetyeq_005_repaired"></label>
                                                    </div>
                                                </td>
                                                <td><input type="text" name="safetyeq_005_mark" class="form-control" placeholder="insert remark here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->

                                <button type="submit" class="btn btn-success col-sm-12">
                                    <h4><b>SAVE</b></h4>
                                </button>

                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>

@endsection