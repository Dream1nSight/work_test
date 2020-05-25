@extends('layouts.app')

@section('head')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let offset = new Date().getTimezoneOffset();
            document.querySelector("input[name=_tz]").setAttribute("value", offset);

            document.querySelector("input[name=cust_exp]").addEventListener("change", function(e) {
                let cust_exp_panel = document.querySelector("#cust_exp_panel");
                let exp_panel = document.querySelector("#exp_panel");

                if (e.target.checked) {
                    exp_panel.setAttribute("hidden", "");
                    cust_exp_panel.removeAttribute("hidden");
                } else {
                    cust_exp_panel.setAttribute("hidden", "");
                    exp_panel.removeAttribute("hidden");
                }
            });
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <form method="POST" action="/create">
            @csrf
            <input type="hidden" name="_tz">
            <textarea name="paste" style="width: 70%" rows="10"></textarea>
            <p>Public paste <input type="checkbox" name="public"></p>
            <p>Custom expiration date <input type="checkbox" name="cust_exp"></p>
            <p id="cust_exp_panel" hidden>Expiries at <input type="datetime-local" name="expiries"></p>
            <p id="exp_panel">Expiries in
                <select name="expiries">
                    <option value="10">10 minutes</option>
                    <option value="60">1 hour</option>
                    <option value="180">3 hours</option>
                    <option value="1440">1 day</option>
                    <option value="10080">1 week</option>
                    <option value="43200">1 month</option>
                    <option value="">Eternal</option>
                </select>
            </p>
            <p>Paste name/title <input type="text" name="title"></p>
            <input type="submit" value="Create Paste">
        </form>
    </div>
@endsection
