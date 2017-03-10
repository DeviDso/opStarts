<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';

    protected $fillable = ['sender_id', 'receiver_id', 'text'];
}
