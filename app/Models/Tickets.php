<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{


    use HasFactory;
    protected $fillable=[
        'user_id',
        'event_id',
        'isAccept',
        'status',

    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
