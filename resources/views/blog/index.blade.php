<?php
/**
 * Created by PhpStorm.
 * User: danneco
 * Date: 12-2-17
 * Time: 16:03
 */
?>
@extends('layouts.master')

@section('content')

<div class="container">

    @include('layouts.partials.header')

    <div class="row">

        <div class="col-sm-8 blog-main">
            @if($posts)
                @foreach($posts as $post)
                    <div class="blog-post">
                        <h2 class="blog-post-title"><?= $post->title; ?></h2>
                        <p class="blog-post-meta"><?= $post->created_at; ?> by <a href="#"><?= $post->name; ?></a></p>
                        <p><?= $post->body; ?></p>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            {!! Form::open(['method' => 'POST']) !!}
                            @include('blog.partials.fields')
                            <button type="submit" class="btn btn-default">SUBMIT</button>
                            {!! Form::close() !!}
                        @else
                            <p><a href="{{ url('login') }}"><button type="button" class="btn btn-primary">Login/Register</button></a></p>
                        @endif
                        @if($comments)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td><h3 class="blog-post-title">Comments</h3></td>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($comments as $comment)
                                        @if($comment->post_id == $post->id)
                                            <tr><td>{{ $comment->comment }}</td></tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                    </div><!-- /.blog-post -->
                @endforeach
                    {{ $posts->links() }}
            @endif
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    @if($dates)
                        @foreach($dates as $date)
                            <span class="blog-post-meta"><?= $date->month_name; ?>-<?= $date->year; ?></span>
                            <li><a href="?page={{$date->id}}"> {{ $date->title }}</a></li>
                        @endforeach
                    @endif
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->
@endsection