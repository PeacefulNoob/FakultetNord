@extends('layouts.app')

@section('content')

<div class="container text-white ">
    

        <div class="col-md-12 col-md-offset-2 m-auto">
            <div class="panel panel-default">
                <div class="postMain">

                    <div class="panel-body">
                     
                        <h3 class="my-5">Your Blog Posts</h3>
                        @if(count($posts) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th> Option </th>
                                    <th>Option</th>
                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>
                                        </td>
                                        <td>
                                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method'
                                            => 'POST', 'class' => ''])!!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no posts</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
