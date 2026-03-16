<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $fillable = [
        'title',
        'description',
        'video',
    ];

    public function videosRequests()
    {
        return $this->hasMany(videos_request::class);
    }

    public function videoAccessLogs()
    {
        return $this->hasMany(video_access_logs::class);
    }
}
