<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Managers\CardManager;

class CardController extends Controller
{
    protected $cardManager;

    public function __construct(CardManager $cardManager)
    {
        $this->cardManager = $cardManager;
    }

    public function index()
    {
        return response()->json(['cards' => Card::all()], 200);
    }

    public function store(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Carte créé !',
            'card' => $this->cardManager->create($request->all())
        ], 200);
    }

    public function show(int $id)
    {
        return response()->json(['card' => Card::findOrFail($id)], 200);
    }

    public function update(Request $request, int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Carte mise à jour !',
            'card' => $this->cardManager->update(Card::findOrFail($id), $request->all()),
        ], 200);
    }

    public function destroy(int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Carte supprimée !',
            'card' => $this->cardManager->delete(Card::findOrFail($id))
        ], 200);
    }
}
