<?php

namespace opStarts;

use Illuminate\Database\Eloquent\Model;
use Nexmo\Laravel\Facade\Nexmo;

class Confirmation extends Model
{
    protected $table = 'phone_confirmation';

    public static function send($number, $code)
    {
        Nexmo::message()->send([
            'to' => $number,
            'from' => 'NEXMO',
            'text' => 'Your activation code: ' . $code . ' www.opStarts.dk'
        ]);
    }
}
