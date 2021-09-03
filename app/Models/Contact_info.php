<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_info extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function m_slug()
    {
        return $this->belongsTo(User::class, 'slug_id', 'id');
    }
}
