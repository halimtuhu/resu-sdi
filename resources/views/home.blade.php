@extends('layouts.app')
@section('title', 'Dashboard')
@section('contents')
    <div class="row">
        <div class="col">
            <div class="jumbotron bg-white">
                <h3>Welcome, {{ auth()->user()->name }}</h3>
                <p>This application is intended to facilitate the survey process in the field for customers who are constrained by internet networks efficiently.</p>
                <hr class="my-4">
                <p>This application can only be used by teams from the SDI division (Survey Data Inventory).</p>
                <p>
                    <a class="btn btn-fill btn-danger btn-md" href="{{ route('work-order.index') }}" role="button">See Work Orders</a>
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold">Next WO</h5>
                    <p class="h1 text-right">{{ $nextWO }} <span class="h5 muted">WO(s)</span></p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold">Technicians</h5>
                    <p class="h1 text-right">{{ $technicians }} <span class="h5 muted">people(s)</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
