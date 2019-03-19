@extends ('layouts.app')

@section ('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h5 class="mb-3">Update Work Order</h5>
        <div class="card">
          <form action="{{ route('work-order.update', $workOrder->id) }}" method="post">
            @csrf
            @method('put')

            <div class="card-body">
              @if (session('error'))
                <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
                </div>
              @endif
              <div class="form-group">
                <label for="order-date">Order Date</label>
                <input id="order-date" class="form-control" name="order_date" value="{{ $workOrder->order_date }}">
              </div>
              <div class="form-group">
                <label for="customer-name">Customer Name</label>
                <input id="customer-name" type="text" class="form-control{{ $errors->has('customer_name') ? ' is-invalid' : '' }}" name="customer_name" value="{{ $workOrder->customer_name }}">
                @if ($errors->has('customer_name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('customer_name') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="customer-address">Customer Address</label>
                <textarea id="customer-address" class="form-control{{ $errors->has('customer_address') ? ' is-invalid' : '' }}" name="customer_address" rows="10">{{ $workOrder->customer_address }}</textarea>
                @if ($errors->has('customer_address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('customer_address') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="status">Survey Status</label>
                <select name="status" id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                  <option value="PT1"{{ $workOrder->status == 'PT1' ? ' selected' : '' }}>PT1</option>
                  <option value="PT1"{{ $workOrder->status == 'PT2' ? ' selected' : '' }}>PT1</option>
                  <option value="PT1"{{ $workOrder->status == 'PT3' ? ' selected' : '' }}>PT1</option>
                </select>
                @if ($errors->has('status'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="phone-number">Phone Number</label>
                <input id="phone-number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $workOrder->phone_number }}">
                @if ($errors->has('phone_number'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="ref-id">Source ID</label>
                <input id="ref-id" type="text" class="form-control{{ $errors->has('ref_id') ? ' is-invalid' : '' }}" name="ref_id" value="{{ $workOrder->ref_id }}" title="Reference ID">
                @if ($errors->has('ref_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ref_id') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="description">Survey Note</label>
                <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="10"></textarea>
                @if ($errors->has('description'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="surveyor-name">Surveyor</label>
                <input id="surveyor-name" type="text" class="form-control{{ $errors->has('surveyor') ? ' is-invalid' : '' }}" value="{{ auth()->user()->name }}">
                <input id="surveyor-id" type="hidden" class="form-control" name="surveyor" value="{{ auth()->user()->id }}">
                @if ($errors->has('surveyor'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('surveyor') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="card-footer p-0">
              <button class="btn btn-primary btn-block" type="submit">UPDATE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection