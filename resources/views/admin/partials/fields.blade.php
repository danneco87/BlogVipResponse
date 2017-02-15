<?php
/**
 * Created by PhpStorm.
 * User: danneco
 * Date: 11-12-15
 * Time: 13:23
 */
?>
<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Body') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

