@extends('layouts.app')
@section('title', 'Admin Management')
@section('contents')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h4 class="card-title">Admin List</h4>
                            <p class="card-category">List of all user who has role as admin on this system</p>
                        </div>
                        <div class="col-3 text-right">
                            <span class="h4 pr-3"><a href="{{ route('admin-management.create') }}" class="text-primary"><i class="fa fa-plus"></i></a></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>NIK</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($admins)
                                    @foreach($admins as $key => $admin)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td><a href="mailto:{{ $admin->email }}">{{ $admin->email }}</a></td>
                                            <td>{{ $admin->uid }}</td>
                                            <td>{{ $admin->position }}</td>
                                            <td class="text-center">
                                                <span><a href="{{ route('admin-management.edit', $admin->id) }}" title="Edit Admin" class="text-warning mr-2"><i class="fa fa-edit"></i></a><a href="#" title="Delete Admin" class="text-danger mr-2" onclick="document.getElementById('admin{{ $admin->id }}').submit();"><i class="fa fa-trash"></i></a></span>
                                                <form id="admin{{ $admin->id }}" action="{{ route('admin-management.delete', $admin->id) }}" method="post">@csrf @method('delete')</form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection