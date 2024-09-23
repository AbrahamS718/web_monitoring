@extends('components.layouts.app')

@section('content')
@livewire('adminlte.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vessel Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vessel Management</li>
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
                            <h3 class="card-title">Vessel List</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.vesselinsert') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="hidden" name="action" value="vessel">
                                    <select class="custom-select" name="egi_vessel">
                                        <option selected>Select EGI Vessel</option>
                                        @foreach ($egi_vessel as $data)
                                        <option value="{{$data->name}}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="custom-select" name="unit_vessel">
                                        <option selected>Select Unit Vessel</option>
                                        @foreach ($unit_vessel as $data)
                                        <option value="{{$data->name}}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">ADD</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="list_vessel" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>EGI Vessel</th>
                                        <th>Unit Vessel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vessel as $data)
                                    <tr>
                                        <td>{{ $data->egi_vessel }}</td>
                                        <td>{{ $data->unit_vessel }}</td>
                                        <td>
                                            <a href=" {{ route('admin.vesselview.index', ['index' => 'delete', 'action' => 'vessel' , 'id' => $data->id]) }} ">
                                                <i class="fa fa-trash fa-2x text-danger p-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">EGI Vessel List</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.vesselinsert') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="hidden" name="action" value="egi_vessel">
                                    <input type="text" class="form-control" name="name" placeholder="Insert EGI Vessel Name" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">ADD</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="list_egi_vessel" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>EGI Vessel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($egi_vessel as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <a href=" {{ route('admin.vesselview.index', ['index' => 'delete', 'action' => 'egi_vessel' , 'id' => $data->id]) }} ">
                                                <i class="fa fa-trash fa-2x text-danger p-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Unit Vessel List</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.vesselinsert') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="hidden" name="action" value="unit_vessel">
                                    <input type="text" class="form-control" name="name" placeholder="Insert Unit Vessel Name" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">ADD</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="list_unit_vessel" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Unit Vessel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unit_vessel as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <a href=" {{ route('admin.vesselview.index', ['index' => 'delete', 'action' => 'unit_vessel' , 'id' => $data->id]) }} ">
                                                <i class="fa fa-trash fa-2x text-danger p-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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