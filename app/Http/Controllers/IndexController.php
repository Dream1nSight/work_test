<?php

    namespace App\Http\Controllers;

    use App\Paste;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\DB;
    use Laravel\Socialite\Facades\Socialite;

    class IndexController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return view('index');
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
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Paste  $paste
         * @return \Illuminate\Http\Response
         */
        public function show(Paste $paste)
        {
            //
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
