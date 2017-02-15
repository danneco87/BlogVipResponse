<?php
/**
 * Created by PhpStorm.
 * User: danneco
 * Date: 13-2-17
 * Time: 15:28
 */
?>
@extends('layouts.app')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header"> Edit</h1>

        @include('admin.partials.errors')

        {!! Form::model($comment, ['route' => ['update', $comment->id], 'method' => 'PUT']) !!}
        @include('admin.partials.edit')
        <button type="submit" class="btn btn-default">SUBMIT</button>
        {!! Form::close() !!}

    </div>
@endsection
