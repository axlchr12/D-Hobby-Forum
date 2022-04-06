<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $guarded = ['id_comments'];
    protected $primaryKey = 'id_comments';
    protected $touches = ['posts'];

    public function posts() {
        return $this->belongsTo(Posts::class, 'id_post');
    }
    

}
