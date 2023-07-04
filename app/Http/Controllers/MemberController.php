<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Managers\MemberManager;

class MemberController extends Controller
{
    protected $memberManager;

    public function __construct(MemberManager $memberManager)
    {
        $this->memberManager = $memberManager;
    }

    public function index()
    {
        return response()->json(['members' => Member::all()], 200);
    }

    public function store(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Membre créé !',
            'card' => $this->memberManager->create($request->all())
        ], 200);
    }

    public function show(int $id)
    {
        return response()->json(['member' => Member::findOrFail($id)], 200);
    }

    public function update(Request $request, int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Membre mise à jour !',
            'member' => $this->memberManager->update(Member::findOrFail($id), $request->all()),
        ], 200);
    }

    public function destroy(int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Membre supprimé !',
            'member' => $this->memberManager->delete(Member::findOrFail($id))
        ], 200);
    }
}
