@extends('components.layouts.app')

@section('content')

@livewire('adminlte.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Prime Mover Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Prime Mover Management</li>
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
                            <h3 class="card-title">Prime Mover List</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.pminsert') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="hidden" name="action" value="pm">
                                    <select class="custom-select" name="egi_pm">
                                        <option selected>Select EGI Prime Mover</option>
                                        @foreach ($egi_pm as $data)
                                        <option value="{{$data->name}}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="custom-select" name="unit_pm">
                                        <option selected>Select Unit Prime Mover</option>
                                        @foreach ($unit_pm as $data)
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
                            <table id="list_pm" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>EGI Prime Mover</th>
                                        <th>Unit Prime Mover</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pm as $data)
                                    <tr>
                                        <td>{{ $data->egi_pm }}</td>
                                        <td>{{ $data->unit_pm }}</td>
                                        <td>
                                            <a href=" {{ route('admin.pmview.index', ['index' => 'delete', 'action' => 'pm' , 'id' => $data->id]) }} ">
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
                            <h3 class="card-title">EGI Prime Mover List</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.pminsert') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="hidden" name="action" value="egi_pm">
                                    <input type="text" class="form-control" name="name" placeholder="Insert EGI Prime Mover Name" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">ADD</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="list_egi_pm" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>EGI Prime Mover</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($egi_pm as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <a href=" {{ route('admin.pmview.index', ['index' => 'delete', 'action' => 'egi_pm' , 'id' => $data->id]) }} ">
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
                            <h3 class="card-title">Unit Prime Mover List</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.pminsert') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="hidden" name="action" value="unit_pm">
                                    <input type="text" class="form-control" name="name" placeholder="Insert Unit Prime Mover Name" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">ADD</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="list_unit_pm" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Unit Prime Mover</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unit_pm as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <a href=" {{ route('admin.pmview.index', ['index' => 'delete', 'action' => 'unit_pm' , 'id' => $data->id]) }} ">
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