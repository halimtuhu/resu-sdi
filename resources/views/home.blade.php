@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb')
  <li class="breadcrumb-item">
    <a href="{{ route('home') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Blank Page</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <section>
        <h5 class="mb-3">Work Orders <span class="float-right"><a href="{{ route('work-order.create') }}" class="m-0"><i class="material-icons">add</i></a></span></h5>

        <ul class="list-group">
          @isset ($workOrders)
            @foreach ($workOrders as $workOrder)
              <li class="list-group-item">
                <h6 class="font-weight-bold m-0">{{ $workOrder->customer_name }}</h6>
                <p class="m-0 small">
                  <span>{{ date('Y-m-d', strtotime($workOrder->order_date)) }}</span>
                  <span class="float-right">
                      <a href="{{ route('work-order.edit', $workOrder->id) }}"><i class="material-icons md-18 text-info">visibility</i></a>
                      <a href="#"><i class="material-icons md-18 text-danger">delete</i></a>
                  </span>
                </p>
                <p class="m-0 small"><span class="badge badge-primary">{{ $workOrder->ref_id }}</span> <span class="badge badge-warning">{{ $workOrder->sto }}</span> <span class="badge badge-success">{{ $workOrder->source }}</span></p>
              </li>
            @endforeach
          @else
            <span class="text-center small"><i>Currently, No work order for now.</i></span>
          @endisset
        </ul>
      </section>
    </div>
  </div>
@endsection
