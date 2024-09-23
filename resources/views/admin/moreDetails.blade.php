<style>
    .vertical-text {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        text-align: center;
        vertical-align: middle;
        padding: 10px;
        /* Adjust as necessary */
    }
</style>

@extends('components.layouts.app')

@section('content')

@livewire('adminlte.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Details Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Details Information</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Details Machine</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.detailInfo.index', ['index' => 'view']) }}" method="get">
                                <div class="form-group row">
                                    <input type="hidden" name="id" value="{{ $connect_p2v[0]->id }}">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Select Daily Data</label>
                                    <div class="col-sm-5">
                                        <select class="custom-select" name="month">
                                            <option selected>Month</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="year" class="form-control" placeholder="Years">
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </div>
                            </form>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Location</label>
                                <div class="col-sm-10">
                                    <input type="text" name="location" class="form-control" placeholder="Location" value="{{ $connect_p2v[0]->location }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Prime Mover</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pm" class="form-control" placeholder="pm" value="{{ $pm[0]->egi_pm.' | '.$pm[0]->unit_pm }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Vessel</label>
                                <div class="col-sm-10">
                                    <input type="text" name="vessel" class="form-control" placeholder="vessel" value="{{ $vessel[0]->egi_vessel.' | '. $vessel[0]->unit_vessel }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">HM Prime Mover</label>
                                <div class="col-sm-10">
                                    <input type="text" name="hm_pm" class="form-control" placeholder="HM Prime Mover" value="{{ $connect_p2v[0]->hm_pm }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">HM Vessel</label>
                                <div class="col-sm-10">
                                    <input type="text" name="hm_vessel" class="form-control" placeholder="hm_vessel" value="{{ $connect_p2v[0]->hm_vessel }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Datetime Connect</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="created_at" class="form-control" value="{{ $connect_p2v[0]->created_at }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">PIC</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pic" class="form-control" placeholder="Lists of PIC" value="{{ $connect_p2v[0]->pic }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Photo Evidence</label>
                                <div class="col-sm-10">
                                    <img src="{{ Storage::disk('public')->url($connect_p2v[0]->bukti_foto) }}" alt="{{ Storage::disk('public')->url($connect_p2v[0]->bukti_foto) }}" class="img-fluid rounded mx-auto d-block" style="max-width: 50%; height: auto;">
                                </div>
                            </div>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Item to Check</th>
                                    <th>Check Point</th>
                                    <th>Condition</th>
                                    <th>Remark</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th rowspan="6" class="vertical-text">FIFTH WHEEL</th>
                                        <td>Locking Bar</td>
                                        <td>Condition, Position</td>
                                        <td>{{ $connect_p2v[0]->fifthwheel_001 }}</td>
                                        <td>{{ $connect_p2v[0]->fifthwheel_001_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Locking Bar</td>
                                        <td>Condition, Position</td>
                                        <td>{{ $connect_p2v[0]->fifthwheel_002 }}</td>
                                        <td>{{ $connect_p2v[0]->fifthwheel_002_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Locking Bar</td>
                                        <td>Condition, Position</td>
                                        <td>{{ $connect_p2v[0]->fifthwheel_003 }}</td>
                                        <td>{{ $connect_p2v[0]->fifthwheel_003_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Locking Bar</td>
                                        <td>Condition, Position</td>
                                        <td>{{ $connect_p2v[0]->fifthwheel_004 }}</td>
                                        <td>{{ $connect_p2v[0]->fifthwheel_004_mark }}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <th>#</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th rowspan="7" class="vertical-text">BRAKE SYSTEM</th>
                                        <td>Air Pressure System</td>
                                        <td>Leaks, Gauge Position</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_001 }}</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_001_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-warning">Hose Control to Vessel</td>
                                        <td>Leaks, Damage, Unusual Noise</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_002 }}</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_002_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-danger">Hose Supply to Vessel</td>
                                        <td>Leaks, Damage, Unusual Noise</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_003 }}</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_003_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Coupler Connection</td>
                                        <td>Damage, Unusual Noise</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_004 }}</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_004_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Brake Valve PM & Vessel</td>
                                        <td>Leaks, Damage, Unusual Noise</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_005 }}</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_005_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Slack Adjuster</td>
                                        <td>Fuction, Condition</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_006 }}</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_006_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Hose & Chamber Brake</td>
                                        <td>Leaks, Damage, Unusual Noise</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_007 }}</td>
                                        <td>{{ $connect_p2v[0]->brakesystem_007_mark }}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <th>#</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th rowspan="5" class="vertical-text">DUMPING TEST</th>
                                        <td>Pneumatic Hose to Control Valve</td>
                                        <td>Leaks, Gauge Position (Min.9 Bar)</td>
                                        <td>{{ $connect_p2v[0]->dumpingtest_001 }}</td>
                                        <td>{{ $connect_p2v[0]->dumpingtest_001_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>PTO</td>
                                        <td>Leaks, Damage, Unusual Noise</td>
                                        <td>{{ $connect_p2v[0]->dumpingtest_002 }}</td>
                                        <td>{{ $connect_p2v[0]->dumpingtest_002_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-danger">Hydarulic Hose PM</td>
                                        <td>Damage, Leaks, Loose</td>
                                        <td>{{ $connect_p2v[0]->dumpingtest_003 }}</td>
                                        <td>{{ $connect_p2v[0]->dumpingtest_003_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Hydraulic Hose Vessel</td>
                                        <td>Damage, Leaks, Loose</td>
                                        <td>{{ $connect_p2v[0]->dumpingtest_004 }}</td>
                                        <td>{{ $connect_p2v[0]->dumpingtest_004_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Joystick Mechanisme</td>
                                        <td>Good Function</td>
                                        <td>{{ $connect_p2v[0]->dumpingtest_005 }}</td>
                                        <td>{{ $connect_p2v[0]->dumpingtest_005_mark }}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <th>#</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th rowspan="5" class="vertical-text">ELECTRICAL SYSTEM</th>
                                        <td>Electrical Connection to Vesse</td>
                                        <td>Damage, Loose</td>
                                        <td>{{ $connect_p2v[0]->electricalsystem_001 }}</td>
                                        <td>{{ $connect_p2v[0]->electricalsystem_001_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Position lamp Vs 1 & Vs 2</td>
                                        <td>OFF, Damage, Loose</td>
                                        <td>{{ $connect_p2v[0]->electricalsystem_002 }}</td>
                                        <td>{{ $connect_p2v[0]->electricalsystem_002_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sign Lamp Vs 1 & Vs 2</td>
                                        <td>OFF, Damage, Loose</td>
                                        <td>{{ $connect_p2v[0]->electricalsystem_003 }}</td>
                                        <td>{{ $connect_p2v[0]->electricalsystem_003_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Brake Lamp Vs 1 & Vs 2</td>
                                        <td>OFF, Damage, Loose</td>
                                        <td>{{ $connect_p2v[0]->electricalsystem_004 }}</td>
                                        <td>{{ $connect_p2v[0]->electricalsystem_004_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Auxlliary Brake Lamp Vs 2</td>
                                        <td>OFF, Damage, Loose</td>
                                        <td>{{ $connect_p2v[0]->electricalsystem_005 }}</td>
                                        <td>{{ $connect_p2v[0]->electricalsystem_005_mark }}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <th>#</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th rowspan="5" class="vertical-text">SAFETY EQUIPMENT</th>
                                        <td>Wheel Block</td>
                                        <td>Condition, Position</td>
                                        <td>{{ $connect_p2v[0]->safetyeq_001 }}</td>
                                        <td>{{ $connect_p2v[0]->safetyeq_001_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Safety Cone</td>
                                        <td>Condition, Position</td>
                                        <td>{{ $connect_p2v[0]->safetyeq_002 }}</td>
                                        <td>{{ $connect_p2v[0]->safetyeq_002_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bushing Towing</td>
                                        <td>Worn,Condition</td>
                                        <td>{{ $connect_p2v[0]->safetyeq_003 }}</td>
                                        <td>{{ $connect_p2v[0]->safetyeq_003_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Draw Bar</td>
                                        <td>Damage, Bending, Broken</td>
                                        <td>{{ $connect_p2v[0]->safetyeq_004 }}</td>
                                        <td>{{ $connect_p2v[0]->safetyeq_004_mark }}</td>
                                    </tr>
                                    <tr>
                                        <td>Safety Sling</td>
                                        <td>Damage, Condition</td>
                                        <td>{{ $connect_p2v[0]->safetyeq_005 }}</td>
                                        <td>{{ $connect_p2v[0]->safetyeq_005_mark }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>

                            @if (isset($daily_check))
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th>Bulan :
                                            @switch($_GET['month'])
                                            @case('01')
                                            Januari
                                            @break
                                            @case('02')
                                            Februari
                                            @break
                                            @case('03')
                                            Maret
                                            @break
                                            @case('04')
                                            April
                                            @break
                                            @case('05')
                                            Mei
                                            @break
                                            @case('06')
                                            Juni
                                            @break
                                            @case('07')
                                            Juli
                                            @break
                                            @case('08')
                                            Agustus
                                            @break
                                            @case('09')
                                            September
                                            @break
                                            @case('10')
                                            Oktober
                                            @break
                                            @case('11')
                                            November
                                            @break
                                            @case('12')
                                            Desember
                                            @break
                                            @endswitch
                                        </th>
                                        <th class="text-center" colspan="{{ count($days) }}">KETEBALAN LINING (mm)</th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        @for ($i=0; $i<count($days); $i++)
                                            <th>{{ $days[$i] }}</th>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <th rowspan="9" class="vertical-text">VESSEL 1</th>
                                    </tr>
                                    <tr>
                                        <td>Axle No.1 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v1_l1[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.1 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v1_r1[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.2 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v1_l2[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.2 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v1_r2[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.3 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v1_l3[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.3 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v1_r3[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.4 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v1_l4[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.4 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v1_r4[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <th rowspan="7" class="vertical-text">DOLLY</th>
                                    </tr>
                                    <tr>
                                        <td>Axle No.1 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$d_l1[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.1 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$d_r1[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.2 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$d_l2[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.2 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$d_r2[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.3 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$d_l3[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.3 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$d_r3[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <th rowspan="9" class="vertical-text">VESSEL 2</th>
                                    </tr>
                                    <tr>
                                        <td>Axle No.1 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v2_l1[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.1 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v2_r1[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.2 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v2_l2[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.2 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v2_r2[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.3 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v2_l3[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.3 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v2_r3[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.4 Kiri</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v2_l4[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <td>Axle No.4 Kanan</td>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$v2_r4[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-center">Keterangan</th>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$keterangan[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-center">Status</th>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$status[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-center">Bays</th>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td> {{$bays[$i]}} </td>
                                            @endfor
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-center">Action</th>
                                        @for ($i=0; $i<count($days); $i++)
                                            <td>
                                            <a href=" {{ route('admin.detailInfo.index', ['index' => 'delete',  'id_dailycheck' => $id[$i], 'id' => $_GET['id'], 'month' => $_GET['month'], 'year' => $_GET['year'] ]) }} ">
                                                <i class="fa fa-trash fa-2x text-danger p-1"></i>
                                            </a>
                                            </td>
                                            @endfor
                                    </tr>
                                </tbody>
                            </table>
                            @else
                            <h4>Please Select Month and Years!!!</h4>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection