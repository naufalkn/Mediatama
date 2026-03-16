<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class video_access_logs extends Model
{
    protected $fillable = [
        'user_id',
        'video_id',
        'accessed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Videos::class);
    }

    public function request()
    {
        return $this->belongsTo(videos_request::class, 'video_id', 'video_id');
    }
}
