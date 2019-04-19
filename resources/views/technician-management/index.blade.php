@extends('layouts.app')
@section('title', 'Technician Management')
@section('contents')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h4 class="card-title">Technician List</h4>
                            <p class="card-category">List of all user who has role as technician on this system</p>
                        </div>
                        <div class="col-3 text-right">
                            <span class="h4 pr-3"><a href="{{ route('technician-management.create') }}" class="text-primary"><i class="fa fa-plus"></i></a></span>
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
                                    <th>Phone</th>
                                    <th>Work Locations</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($technicians)
                                    @foreach($technicians as $key => $technician)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $technician->name }}</td>
                                            <td><a href="mailto:{{ $technician->email }}">{{ $technician->email }}</a></td>
                                            <td>{{ $technician->uid }}</td>
                                            <td>{{ $technician->phone_number }}</td>
                                            <td>{{ $technician->work_locations }}</td>
                                            <td class="text-center">
                                                <span><a href="{{ route('technician-management.edit', $technician->id) }}" title="Edit Technician" class="text-warning mr-2"><i class="fa fa-edit"></i></a><a href="#" title="Delete Technician" class="text-danger mr-2" onclick="document.getElementById('technician{{ $technician->id }}').submit();"><i class="fa fa-trash"></i></a></span>
                                                <form id="technician{{ $technician->id }}" action="{{ route('technician-management.delete', $technician->id) }}" method="post">@csrf @method('delete')</form>
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