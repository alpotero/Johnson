@extends('layouts.metrolayout')

@section('content')
    <h1>Create Posts</h1>

    <div class="container">
        @include('inc.messages')
        <!-- Collective HTML-->
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', '', ['class' => 'metro-input', 'placeholder' => 'Put title here']) }} </br>
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Body') }}
                {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'metro-input', 'placeholder' => 'Put post body here']) }} </br>
            </div>
            <div class="form-group">
                {{ Form::submit('Publish Post', ['class'=>'button success']) }}
            </div>

            
        {!! Form::close() !!}
    </div>


@endsection