<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'type';
    protected $guarded = ['id_type'];
    protected $primaryKey = 'id_type';

    public function posts() {
        return $this->hasMany(Posts::class, 'id_type');
    }
}
