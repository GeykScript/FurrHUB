<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'user_msg',
        'admin_reply',
        'admin_id',
        'msg_status',
        'reply_status',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' );

    }
    public function admin()
    {
        return $this->belongsTo(User::class , 'admin_id' );
    }

    public function msg_status()
    {
        return $this->belongsTo(Status::class , 'msg_status' );
    }
    public function replyStatus()
    {
        return $this->belongsTo(Status::class , 'reply_status' );
    }
}
