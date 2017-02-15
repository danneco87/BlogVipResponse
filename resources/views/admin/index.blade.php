@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <p><a href="{{ url('admin/create') }}"><button type="button" class="btn btn-primary">Create Post</button></a></p>
                    <div class="table-responsive">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Post ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($comments)
                                @foreach($comments as $comments)
                                    <tr>
                                        <td><?= $comments->post_id; ?></td>
                                        <td><?= $comments->name; ?></td>
                                        <td><?= $comments->title; ?></td>
                                        <td><?= $comments->comment; ?></td>
                                        <td><a href="{{ url('/admin/edit'.'/'.$comments->id) }}"><button type="button" class="btn btn-sm btn-warning">EDIT</button></a></td>
                                        <td><a href="{{ url('/admin/destroy/'.$comments->id) }}"><button type="button" class="btn btn-sm btn-danger">DELETE</button></a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Post ID</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($posts)
                            @foreach($posts as $post)
                                <tr>
                                    <td><?= $post->id; ?></td>
                                    <td><?= $post->name; ?></td>
                                    <td><?= $post->title; ?></td>
                                    <td><?= $post->body; ?></td>
                                    <td><a href="{{ url('/admin/edit'.'/'.$post->id) }}"><button type="button" class="btn btn-sm btn-warning">EDIT</button></a></td>
                                    <td><a href="{{ url('/admin/destroy/'.$post->id) }}"><button type="button" class="btn btn-sm btn-danger">DELETE</button></a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
