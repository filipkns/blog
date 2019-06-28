@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create post</a>
                    <h3>Your Blog Posts</h3>
                    <table class="table table-striped">
                        <tr>
                            <td>Title</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach($posts as $post)
                            <td>{{$post->title}}</td>
                            <td><a href="/posts/{{$post->id}}" class="btn btn-default">Edit</a></td>
                            <td>    {!!Form::open(['action' =>['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'push-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete' , ['class' => 'btn btn-danger' ])}}
                                {!! Form::close()!!}</td>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
