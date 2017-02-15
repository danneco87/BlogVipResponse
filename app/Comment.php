<?php
/**
 * Created by PhpStorm.
 * User: danneco
 * Date: 12-2-17
 * Time: 21:41
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'post_id', 'user_id'];


}
