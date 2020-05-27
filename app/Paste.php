<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    const ACCESS_UNLISTED = 0;
    const ACCESS_PUBLIC = 1;
    const ACCESS_PRIVARE = 2;

    public static function getLastPastes(int $count, int $user_id = null, int $access_type = null)
    {
        if (is_null($user_id)) {
            return Paste::latest()
                ->where('access', self::ACCESS_PUBLIC)
                ->where(function ($q) {
                    $q->where('expiries_at', '>', now())
                        ->orwhere('expiries_at', null);
                })
                ->take($count)
                ->get();
        } else {
            if (is_null($access_type)) {
                return Paste::latest()
                    ->where('user_id', $user_id)
                    ->where(function ($q) {
                        $q->where('expiries_at', '>', now())
                            ->orwhere('expiries_at', null);
                    })
                    ->take($count)
                    ->get();
            } else {
                return Paste::latest()
                    ->where('user_id', $user_id)
                    ->where('access', $access_type)
                    ->where(function($q) {
                        $q->where('expiries_at', '>', now())
                            ->orwhere('expiries_at', null);
                    })
                    ->take($count)
                    ->get();
            }
        }
    }
}
