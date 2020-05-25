<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    public static function getLastPastes(int $count) {
        return Paste::latest()
            ->where('expiries_at', '>', now())
            ->orwhere('expiries_at', '=', null)
            ->take($count)
            ->get();
    }
}
