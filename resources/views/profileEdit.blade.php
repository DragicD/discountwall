@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>

                <div class="panel-body">
                    {{ Auth::user()->storeName }}

                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/profile/update') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('storeName') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Store name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="storeName" value="{{ Auth::user()->storeName }}">

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
                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('storeDescription') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Store description</label>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="storeDescription">{{ Auth::user()->storeDescription }}</textarea>
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
                                <input type="text" class="form-control" name="website" value="{{ Auth::user()->website }}">

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
                                <input type="text" class="form-control" name="vat" value="{{ Auth::user()->vat }}">

                                @if ($errors->has('vat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Add new logo</label>
                            <div class="col-md-6">
                                <input class="control-label" type="file" id="logo" name="logo">

                                @if ($errors->has('logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-btn fa-user"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
