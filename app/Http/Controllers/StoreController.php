<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Managers\StoreManager;

class StoreController extends Controller
{
    protected $storeManager;

    public function __construct(StoreManager $storeManager)
    {
        $this->storeManager = $storeManager;
    }

    public function index()
    {
        return response()->json(['stores' => Store::all()], 200);
    }

    public function store(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Magasin créé !',
            'store' => $this->storeManager->create($request->all())
        ], 200);
    }

    public function show(int $id)
    {
        return response()->json(['store' => Store::findOrFail($id)], 200);
    }

    public function update(Request $request, int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Magasin mis à jour !',
            'store' => $this->storeManager->update(Store::findOrFail($id), $request->all()),
        ], 200);
    }

    public function destroy(int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Magasin supprimé !',
            'store' => $this->storeManager->delete(Store::findOrFail($id))
        ], 200);
    }
}
