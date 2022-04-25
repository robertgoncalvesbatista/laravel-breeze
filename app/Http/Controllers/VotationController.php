<?php

namespace App\Http\Controllers;

use App\Models\Votation;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class VotationController extends Controller
{
    public function index(Request $request)
    {
        $votations = Votation::all();

        return view("votation.index", ["votations" => $votations]);
    }

    public function create()
    {
        return view("votation.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "company" => ["required", "string", "max:255"],
            "cnpj" => ["required", "string", "max:18"],
            "opening_at" => ["required", "date"],
            "closing_at" => ["required", "date", "after:opening_at"],
        ]);

        $votation = Votation::create([
            "company" => $request->company,
            "cnpj" => $request->cnpj,
            "opening_at" => $request->opening_at,
            "closing_at" => $request->closing_at,
        ]);

        event(new Registered($votation));

        return redirect(RouteServiceProvider::VOTATION);
    }

    public function edit(Request $request, $id)
    {
        $votation = Votation::find($id);

        return view("votation.edit", ["votation" => $votation]);
    }

    public function update(Request $request, $id)
    {
        $votation = Votation::where("id", $id)->update([
            "company" => $request->company,
            "cnpj" => $request->cnpj,
            "opening_at" => $request->opening_at,
            "closing_at" => $request->closing_at,
        ]);

        event(new Registered($votation));

        return redirect(RouteServiceProvider::VOTATION);
    }

    public function destroy(Request $request, $id)
    {
        $votation = Votation::find($id);

        $votation->delete();

        return redirect(RouteServiceProvider::VOTATION);
    }
}
