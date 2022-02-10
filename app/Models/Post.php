<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $timestamp = false;
    protected $visible = ['id','title', 'heading', 'body', 'is_private', 'commentable', 'expires', 'user_id_created_by' ,'created_at'. 'updated_at'];

    protected $fillable = ['title', 'heading', 'body', 'is_private', 'commentable', 'expires', 'user_id_created_by'];

    // Relation with the other table
    public function postBelongsToUser () {
        return $this->belongsTo(User::class,'user_id_created_by', 'id' );
    }

}
