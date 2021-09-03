<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'slug_id',
        'caption',
        'picture',
    ];

    public function m_slug()
    {
        return $this->belongsTo(User::class, 'slug_id', 'id');
    }
}
