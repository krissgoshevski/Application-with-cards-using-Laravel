<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;

class CardController extends Controller
{
    //
    public function index()
    {
        return view('card.index', ['cards' => Card::all()]);
    }

    public function store(CardRequest $request)
    {
            $data = $request->validated();

            Card::create($data);

            return redirect(route('admin.cards'));
    }


    public function destroy(Card $card)
    {
        $card->delete();

        return redirect(route('admin.cards'));
    }




    public function edit(Card $card)
    {
        return view('admin.edit', ['card' => $card]);
    }

 

    public function update(CardRequest $request, Card $card)
    {
    $data = $request->validated();
    $card->update($data);

    return redirect(route('admin.cards'));
    }



}
