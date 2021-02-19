@extends('layouts.metrolayout')

@section('content')
    <h1>Edit Posts</h1>

    <div class="container">
        @include('inc.messages')
        <!-- Collective HTML-->
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', $post->title, ['class' => 'metro-input']) }} </br>
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Body') }}
                {{ Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'metro-input']) }} </br>
            </div>
            <!-- Add hidden form to modify the type of request to send which is PUT -->
            {{ Form::hidden('_method', 'PUT') }}
            <div class="form-group">
                {{ Form::submit('Update Post', ['class'=>'button success']) }}
            </div>

            
        {!! Form::close() !!}
    </div>


@endsection