@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    HI {{ Auth::user()->storeName }}
                    this is your data:
                    {{ var_dump(Auth::user()) }}
                    and cities:
                    {{ Auth::user()->id }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
