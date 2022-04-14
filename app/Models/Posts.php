<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Posts extends Model
{
    use HasFactory;
    protected $guarded = ['id_post'];
    protected $table = 'posts';
    protected $with = ['type', 'users'];
    protected $primaryKey = 'id_post';

    public function type() {
        return $this->belongsTo(Type::class, 'type_discussion');
    }

    public function users() {
        return $this->belongsTo(Users::class, 'id_user');
    }

    public function comments() {
        return $this->hasMany(Comments::class, 'id_post');
    }


    public function scopeFilter($query, array $filters) {
        $query->when($filters['q'] ?? false, function($query, $q) {
           return $query->where(function($query) use ($q) {
                $query->where('title_discussion', 'like', '%' . $q . '%');
            });
        });

        $query->when($filters['c'] ?? false, function($query, $c) {
            return $query->whereHas('type', function($query) use ($c) {
                $query->where('type_description', $c);
             });
         });


    }
}
