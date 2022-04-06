<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function posts()
    {
        return $this->hasMany(Posts::class, 'id_user');
    }

}
