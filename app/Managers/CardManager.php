<?php


namespace App\Managers;

use App\Models\Card;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CardManager
{
    public function create(array $data)
    {
        $card = Card::create([
            'reference' => $data['reference'],
            'fidelityPoints' => $data['fidelityPoints'],
            'created_at' => Carbon::now(),
            'updated_at' => NULL
        ]);
        $card->save();
        return $card;
    }

    public function update(Card $card, array $request)
    {
        $request['updated_at'] = Carbon::now();
        $card = Card::where('id', $card->id)->update($request);
        return $card;
    }

    public function delete(Card $card)
    {
        $card = Card::where('id', $card->id)->delete();
    }
}
