<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreMember;
use App\Managers\StoreMemberManager;

class StoreMemberController extends Controller
{
    protected $storeMemberManager;

    public function __construct(StoreMemberManager $storeMemberManager)
    {
        $this->storeMemberManager = $storeMemberManager;
    }

    public function index()
    {
        return response()->json(['store_members' => StoreMember::all()], 200);
    }

    public function store(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Liaison Magasin Membre créé !',
            'store_members' => $this->storeMemberManager->create($request->all())
        ], 200);
    }

    public function show(int $id)
    {
        return response()->json(['store_members' => StoreMember::findOrFail($id)], 200);
    }

    public function update(Request $request, int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Liaison Magasin Membre mis à jour !',
            'store_members' => $this->storeMemberManager->update(StoreMember::findOrFail($id), $request->all()),
        ], 200);
    }

    public function destroy(int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Liaison Magasin Membre supprimé !',
            'store_members' => $this->storeMemberManager->delete(StoreMember::findOrFail($id))
        ], 200);
    }
}
