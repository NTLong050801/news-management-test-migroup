<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'id_category',
        'id_user'
    ];
    public function category(){
        return $this->hasMany(Category::class,'id','id_category');
    }
    public function users(){
        return $this->hasMany(User::class,'id','id_user');
    }
}
