<?php

namespace App\Http\Controllers;

use App\Paste;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use function Sodium\add;

class PasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->post('paste');

        if (strlen($content) == 0)
            return response()->view('/');

        $p = new Paste;
        $p->title = $request->post('title');
        $p->content = $content;

        if (Auth::check()) {
            $p->user_id = auth()->id();

            switch ($request->post('paste_type')) {
                case 'private':
                    $p->access = Paste::ACCESS_PRIVARE;
                    break;
                case 'unlisted':
                    $p->access = Paste::ACCESS_UNLISTED;
                    break;
                default:
                    $p->access = Paste::ACCESS_PUBLIC;
            }
        } else {
            $p->access = boolval($request->post('public'))
                ? Paste::ACCESS_PUBLIC
                : Paste::ACCESS_UNLISTED;
        }

        $exp = $request->post('expiries');

        if (boolval($request->post('cust_exp'))) {
            $p->expiries_at = strlen($exp) ? Carbon::parse($exp)->addMinutes($request->post("_tz")) : null;
        } else {
            $p->expiries_at = strlen($exp) ? now()->addMinutes($exp) : null;
        }

        $p->link = dechex(time());
        $p->save();

        return response()->redirectTo('/' . $p->link);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paste  $paste
     * @return \Illuminate\Http\Response
     */
    public function show(string $hash)
    {
        $paste = Paste::query()->where('link', $hash)->get();

        if ($paste->count()) {
            $paste = $paste[0];

            if (now()->greaterThan(Carbon::parse($paste->expiries_at))) {
                $paste->delete();
                return view('404');
            }

            if ($paste->access == Paste::ACCESS_PRIVARE &&
                ! Auth::check() || $paste->user_id != auth()->id())
                    return view('404');

            return view('paste', compact('paste'));
        } else {
            return view('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paste  $paste
     * @return \Illuminate\Http\Response
     */
    public function edit(Paste $paste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paste  $paste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paste $paste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paste  $paste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paste $paste)
    {
        //
    }
}
