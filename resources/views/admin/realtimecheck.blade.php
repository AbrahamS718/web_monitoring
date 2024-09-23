@extends('components.layouts.app')

@section('content')

@livewire('adminlte.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Realtime Check</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Realtime Check</li>
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
                            <table id="tblrealtimecheck" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>EGI PM</th>
                                        <th>Unit PM</th>
                                        <th>EGI Vessel</th>
                                        <th>Unit Vessel</th>
                                        <th>Latest Checking Datetime</th>
                                        <th>Status</th>
                                        <th>Details</th>
                                        @if (Auth::User()->role == "root" || Auth::User()->role == "admin")
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($view as $data)
                                    <tr>
                                        <td>{{ $data->egi_pm }}</td>
                                        <td>{{ $data->unit_pm }}</td>
                                        <td>{{ $data->egi_vessel }}</td>
                                        <td>{{ $data->unit_vessel }}</td>
                                        @if (isset($data->created_at))
                                        <td>{{ $data->created_at }}</td>
                                        @else
                                        <td colspan="2">Empty Daily Check</td>
                                        @endif
                                        @if (isset($data->status))
                                        <td>{{ $data->status }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('admin.detailInfo.index', ['index' => 'view', 'id' => $data->id]) }}">
                                                <button type="button" class="btn btn-success"><i class="fas fa-info p-1"></i>More</button>
                                            </a>
                                        </td>

                                        @if (Auth::User()->role == "root" || Auth::User()->role == "admin")
                                        <td>
                                            <a href=" {{ route('admin.deleteCheckView.index', ['index' => $data->id]) }} ">
                                                <i class="fa fa-trash fa-2x text-danger p-1"></i>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection