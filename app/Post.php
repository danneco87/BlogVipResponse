<?php
/**
 * Created by PhpStorm.
 * User: danneco
 * Date: 12-2-17
 * Time: 20:33
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'author_id'];

    protected $dates = ['created_at'];


}
