@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('storeName') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Store name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="storeName" value="{{ old('storeName') }}">

                                @if ($errors->has('storeName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('storeName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('storeDescription') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Store description</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="storeDescription" value="{{ old('storeDescription') }}">
                                </textarea>
                                @if ($errors->has('storeDescription'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('storeDescription') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Website</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="website" value="{{ old('website') }}">

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vat') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Vat</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="vat" value="{{ old('vat') }}">

                                @if ($errors->has('vat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Upload logo</label>

                            <div class="col-md-6">
                                <input type="file" id="logo" name="logo">

                                @if ($errors->has('logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <label class="col-md-4 control-label">Select type of your store</label>
                        <select id="store_type" name="store_type">
                            <option value="online">Online store</option>
                            <option value="one_city">Store/stores in one city</option>
                            <option value="many_cities">Stores in many cities</option>
                        </select>

                        <div class="address_div">
                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Country</label>

                                <div class="col-md-6">
                                    <input id = 'country_input' type="text" class="form-control" name="country" value="{{ old('country') }}">

                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">City</label>

                                <div class="col-md-6">
                                    <input id = "city_input" type="text" class="form-control" name="city" value="{{ old('city') }}">

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <label class="col-md-4 control-label">Address name and number</label>
                            <div class="col-md-6 address_name_and_number">
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                            </div>



                            <label class="col-md-4 control-label">Add new address</label>
                            <div class="col-md-6">
                                <button id = 'new_address_button' type="button">+</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="place_request_div">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/send_place_request') }}">
                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Country</label>

                    <div class="col-md-6">
                        <input id = 'country_input_request' type="text" class="form-control" name="country" value="{{ old('country') }}">

                        @if ($errors->has('country'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    {!! csrf_field() !!}
                    <label class="col-md-4 control-label">City</label>

                    <div class="col-md-6">
                        <input id = "city_input_request" type="text" class="form-control" name="city" value="{{ old('city') }}">

                        @if ($errors->has('city'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <label class="col-md-4 control-label">Send request for city or country</label>
                <div class="col-md-6">
                    <button id = 'place_request_button'>Send place request</button>
                </div>
            </form>
         <div class="place_request_div">
    </div>
</div>
@endsection
