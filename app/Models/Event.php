<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'slug_id',
        'title',
        'date_wedding',
        'address',
        'city',
        'caption',
        'man_first',
        'man_last',
        'pic_man',
        'caption_man',
        'women_first',
        'women_last',
        'pic_women',
        'caption_women',
        'ceremony_date',
        'ceremony_time_start',
        'ceremony_time_end',
        'ceremony_caption',
        'party_date',
        'party_time_start',
        'party_time_end',
        'party_caption',
        'gps',
        'status',
    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    public function m_slug()
    {
        return $this->belongsTo(User::class, 'slug_id', 'id');
    }
}
