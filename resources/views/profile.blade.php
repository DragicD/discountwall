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
                    <div>
                        <button class="btn btn-primary" onclick="showPost()">Add new post</button>
                    </div>


                    <!-- -------------------------post------------------------------ -->
                    <div style="display: none" class="post_js col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add new post</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/profile/post/create') }}">
                                    {!! csrf_field() !!}

                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Title</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Type</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="type" value="{{ old('type') }}">

                                            @if ($errors->has('type'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Post description</label>

                                        <div class="col-md-6">
                                <textarea type="text" class="form-control" name="description" value="{{ old('description') }}">
                                </textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('currentPrice') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Current Price</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="currentPrice" value="{{ old('currentPrice') }}">

                                            @if ($errors->has('currentPrice'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('currentPrice') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Discount</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="discount" value="{{ old('discount') }}">

                                            @if ($errors->has('discount'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Duration</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="duration" value="{{ old('duration') }}">

                                            @if ($errors->has('duration'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('postUrl') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Post Url</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="postUrl" value="{{ old('postUrl') }}">

                                            @if ($errors->has('postUrl'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('postUrl') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('filters') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Filters</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="filters" value="{{ old('filters') }}">

                                            @if ($errors->has('filters'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('filters') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('titleImage') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Title image</label>

                                        <div class="col-md-6">
                                            <input class="control-label" type="file" id="titleImage" name="titleImage">

                                            @if ($errors->has('titleImage'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('titleImage') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Images</label>

                                        <div class="col-md-6">
                                            <input class="control-label" type="file" id="images" name="images">

                                            @if ($errors->has('images'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!--<div>
                                        <label class="col-md-4 control-label">Currency</label>

                                        <div class="col-md-6">
                                            <select class="control-label" name="currency">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>

                                        </div>
                                    </div>-->

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary pull-right">
                                                <i class="fa fa-btn fa-user"></i>Add post
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- -------------------------/post------------------------------ -->




                    <div class="col-md-8 col-md-offset-2">
                        <h3>Your previous posts</h3>
                        Here should be all the posts!
                        @foreach ($allPosts as $post)
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">This is post</div>
                                    <div class="panel-body">
                                        <p>{{ $post->tittle }}</p>
                                        <p>{{ $post->description }}</p>
                                        <p>{{ $post->type }}</p>
                                        <p>{{ $post->discount }}</p>
                                        <p>{{ $post->currentPrice }}</p>
                                        <p>{{ $post->duration }}</p>
                                        <p>{{ $post->postUrl }}</p>
                                        <p>{{ $post->filters }}</p>
                                     </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
