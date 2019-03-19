@extends ('layouts.app')

@section ('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h5 class="mb-3">Create Work Order</h5>
        <div class="card">
          <form action="{{ route('work-order.store') }}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="order-date">Order Date</label>
                <input id="order-date" class="form-control" name="order_date" value="{{ old('order_date') ?? date('Y-m-d') }}">
              </div>
              <div class="form-group">
                <label for="customer-name">Customer Name</label>
                <input id="customer-name" type="text" class="form-control{{ $errors->has('customer_name') ? ' is-invalid' : '' }}" name="customer_name" value="{{ old('customer_name') }}">
                @if ($errors->has('customer_name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('customer_name') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="customer-address">Customer Address</label>
                <textarea id="customer-address" class="form-control{{ $errors->has('customer_address') ? ' is-invalid' : '' }}" name="customer_address" rows="10">{{ old('customer_address') }}</textarea>
                @if ($errors->has('customer_address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('customer_address') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="phone-number">Phone Number</label>
                <input id="phone-number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}">
                @if ($errors->has('phone_number'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="sto">STO</label>
                <select name="sto" id="sto" class="form-control{{ $errors->has('sto') ? ' is-invalid' : '' }}">
                  <option value="">-- Choose STO --</option>
                  <option value="KRN">KRN</option>
                  <option value="TUN">TUN</option>
                  <option value="SDA">SDA</option>
                  <option value="PDA">PDA</option>
                  <option value="TDA">TDA</option>
                  <option value="SPI">SPI</option>
                  <option value="SDN">SDN</option>
                  <option value="MJS">MJS</option>
                </select>
                @if ($errors->has('sto'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('sto') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="source">Source</label>
                <select name="source" id="source" class="form-control{{ $errors->has('source') ? ' is-invalid' : '' }}">
                  <option value="">-- Choose Source --</option>
                  <option value="STARCLICK">STARCLICK</option>
                  <option value="LME">LME</option>
                  <option value="BGES">BGES</option>
                </select>
                @if ($errors->has('source'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('source') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="ref-id">Source ID</label>
                <input id="ref-id" type="text" class="form-control{{ $errors->has('ref_id') ? ' is-invalid' : '' }}" name="ref_id" value="{{ old('ref_id') }}" title="Reference ID">
                @if ($errors->has('ref_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ref_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="card-footer p-0">
              <button class="btn btn-primary btn-block" type="submit">CREATE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection