<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tickets;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'category_id',
        'available_seats',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

}

