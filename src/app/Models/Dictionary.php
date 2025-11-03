<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Dictionary extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'keyword',
        'description',
        'user_id'
    ];

    public function scopeKeywordSearch($query, $name)
    {
        if(!empty($text)) {
            $query->where('keyword', 'like', '%' . $text . '%');
        }
        return $query;
    }

        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
