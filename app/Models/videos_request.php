<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class videos_request extends Model
{
    protected $fillable = [
        'user_id',
        'video_id',
        'status',
        'start_access',
        'end_access',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Videos::class);
    }
}
