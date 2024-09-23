@extends('components.layouts.app')

@section('content')

@livewire('adminlte.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daily Check</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daily Check</li>
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
                            <h3 class="card-title">Daily Check for Controlling</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.insertDailyCheck') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Machine List</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" name="id_pv">
                                            <option selected>Select Machine</option>
                                            @foreach ($connectP2V as $data)
                                            <option value="{{ $data['id'] }}">{{ $data['egi_vessel'].' '.$data['unit_vessel'].'|'.$data['egi_pm'].' '.$data['unit_pm'].'|'.$data['location'].'|'.$data['hm_vessel'].'|'.$data['hm_pm']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Bays</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="bays" class="form-control" placeholder="Bays">
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status Machine</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" name="status">
                                            <option selected>Select Status Machine</option>
                                            <option value="rfu">RFU</option>
                                            <option value="breakdown">Breakdown</option>
                                            <option value="vessel waiting prime mover">Vessel Waiting Prime Mover</option>
                                            <option value="prime mover waiting vessel">Prime Mover Waiting Vessel</option>
                                            <option value="service vessel">Service Vessel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Additional Information</label>
                                    <div class="col-sm-10">
                                        <textarea name="keterangan" rows="3" placeholder="Add some additional information here." class="form-control"></textarea>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>Code No Unit</th>
                                                <th>Position</th>
                                                <th>Thickness Lining (mm)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th rowspan="8">VESSEL1</th>
                                                <td>Axle No.1 Kiri</td>
                                                <td><input type="text" name="v1_l1" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.1 Kanan</td>
                                                <td><input type="text" name="v1_r1" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.2 Kiri</td>
                                                <td><input type="text" name="v1_l2" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.2 Kanan</td>
                                                <td><input type="text" name="v1_r2" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.3 Kiri</td>
                                                <td><input type="text" name="v1_l3" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.3 Kanan</td>
                                                <td><input type="text" name="v1_r3" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.4 Kiri</td>
                                                <td><input type="text" name="v1_l4" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.4 Kanan</td>
                                                <td><input type="text" name="v1_r4" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>Code No Unit</th>
                                                <th>Position</th>
                                                <th>Thickness Lining (mm)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th rowspan="8">VESSEL2</th>
                                                <td>Axle No.1 Kiri</td>
                                                <td><input type="text" name="v2_l1" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.1 Kanan</td>
                                                <td><input type="text" name="v2_r1" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.2 Kiri</td>
                                                <td><input type="text" name="v2_l2" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.2 Kanan</td>
                                                <td><input type="text" name="v2_r2" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.3 Kiri</td>
                                                <td><input type="text" name="v2_l3" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.3 Kanan</td>
                                                <td><input type="text" name="v2_r3" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.4 Kiri</td>
                                                <td><input type="text" name="v2_l4" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.4 Kanan</td>
                                                <td><input type="text" name="v2_r4" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>Code No Unit</th>
                                                <th>Position</th>
                                                <th>Thickness Lining (mm)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th rowspan="8">DOLLY</th>
                                                <td>Axle No.1 Kiri</td>
                                                <td><input type="text" name="d_l1" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.1 Kanan</td>
                                                <td><input type="text" name="d_r1" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.2 Kiri</td>
                                                <td><input type="text" name="d_l2" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.2 Kanan</td>
                                                <td><input type="text" name="d_r2" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.3 Kiri</td>
                                                <td><input type="text" name="d_l3" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                            <tr>
                                                <td>Axle No.3 Kanan</td>
                                                <td><input type="text" name="d_r3" class="form-control" placeholder="Insert the Thickness of Lining Here" style="border: none; box-shadow: none;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <button type="submit" class="btn btn-success col-sm-12">
                                    <h4><b>SAVE</b></h4>
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection