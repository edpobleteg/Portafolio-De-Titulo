<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'incidentDate',
        'description',
        'photo',
        'active',
        'user_id',
        'animal_id',
        'category_id',
    ];

    public function animal() {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function favourite() {
        return $this->hasMany(Favourite::class, 'publication_id', 'id');
    }
    public function comment() {
        return $this->hasMany(Comment::class, 'publication_id', 'id');
    }
}
