@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/register/cities') }}">
                            {!! csrf_field() !!}

                            <div class="multi_address_div">

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
                                    <button class = 'new_address_button' type="button">+</button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <button id = 'new_city_button' type="button">Add new city</button>
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
