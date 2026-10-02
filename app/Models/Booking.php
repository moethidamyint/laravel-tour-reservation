<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'customer_name',
        'email',
        'phone',
        'tour_date',
        'number_of_people',
        'total_price',
        'special_requests',
    ];

    // ツアーとのリレーション設定
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
