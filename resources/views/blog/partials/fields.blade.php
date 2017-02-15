<?php
/**
 * Created by PhpStorm.
 * User: danneco
 * Date: 11-12-15
 * Time: 13:23
 */
?>
<div class="form-group">
    {!! Form::hidden('postId', $post->id) !!}
    {!! Form::label('comment', 'Leave a comment:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

