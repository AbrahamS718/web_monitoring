@extends('components.layouts.app')

@section('content')

@livewire('adminlte.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Management User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Management User</li>
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

                        <div class="card-body">
                            <form action="{{ route('admin.editUser.index', ['index' => 'save']) }}" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{$user[0]->id}}">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" value="{{$user[0]->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" value="{{$user[0]->email}}">
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" name="role">
                                            <option value="root" @if ($user[0]->role == 'root')
                                                selected
                                                @endif>root</option>
                                            <option value="admin" @if ($user[0]->role == 'admin')
                                                selected
                                                @endif>admin</option>
                                            <option value="visitor" @if ($user[0]->role == 'visitor')
                                                selected
                                                @endif>visitor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" placeholder="Keep empty if didnt change the password!">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="col-sm-2 btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection