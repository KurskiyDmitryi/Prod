<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'receiver_id',
        'sender_id',
        'status',
    ];

    public function user_sent()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id', 'users');
    }
    public function user_received()
    {
        return $this->belongsTo(User::class, 'received_id', 'id', 'users');
    }
}
