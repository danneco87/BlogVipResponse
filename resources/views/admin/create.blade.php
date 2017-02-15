<?php
/**
 * Created by PhpStorm.
 * User: danneco
 * Date: 12-2-17
 * Time: 19:38
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CREATE A POST</div>
                    {!! Form::open(['route' => 'store', 'method' => 'POST']) !!}
                    @include('admin.partials.fields')
                    <button type="submit" class="btn btn-default">SUBMIT</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

