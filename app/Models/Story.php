<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'slug_id',
        'subject',
        'picture',
        'date',
        'message',
    ];

    public function m_slug()
    {
        return $this->belongsTo(User::class, 'slug_id', 'id');
    }
}
