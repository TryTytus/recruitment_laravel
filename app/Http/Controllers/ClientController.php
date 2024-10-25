<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function show()
    {
        return Client::select('first_name', 'last_name')->get();
    }


    public function details(int $id)
    {
        return Client::with('book')->findOrFail($id);
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:255|regex:/^[a-ząćęóńśżź]+$/i',
            'last_name' => 'required|min:3|max:255|regex:/^[a-ząćęóńśżź]+$/i'
        ]);


        Client::create($request->all());

        return response(null, 201);
    }


    public function remove(int $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response(null, 204);
    }
}
