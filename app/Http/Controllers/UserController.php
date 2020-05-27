<?php

namespace App\Http\Controllers;

use App\Paste;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function ViewMyPastes(int $page = 1)
    {
        $pastes = Paste::where('user_id', auth()->id())
            ->where(function ($q) {
                $q->where('expiries_at', '>', now())
                    ->orwhere('expiries_at', null);
            })
            ->paginate(10, ['*'], 'page', $page);

        return view('mypastes', compact('pastes'));
    }
}
