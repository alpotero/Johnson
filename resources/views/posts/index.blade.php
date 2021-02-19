@extends('layouts.metrolayout')

@section('content')
    <h1>Posts</h1>
    @include('inc.messages')
    <table class="table table-border cell-border subcompact">
        <thead>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        <tbody>
            @if(count($posts) > 1)
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <a href="/posts/{{ $post->id }}/edit" class="button warning small">Edit</a>
                        </td>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <!-- <td>{{ $post->body }}</td> -->
                        <td>{!! $post->body !!}</td> <!-- This will support html parsing for CKEditor input -->
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No Posts Found</td>
                </tr>
            @endif
        </tbody>
    </table>
    <br>
    <a href="/posts/create" class="button primary rounded ml-1">Create Post</a>




@endsection