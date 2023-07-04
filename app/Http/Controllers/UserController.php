<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Managers\UserManager;

class UserController extends Controller
{
    protected $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function index()
    {
        return response()->json(['users' => User::all()], 200);
    }

    public function show(int $id)
    {
        return response()->json(['user' => User::findOrFail($id)], 200);
    }

    public function update(Request $request, int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Utilisateur mis à jour !',
            'user' => $this->userManager->update(User::findOrFail($id), $request->all()),
        ], 200);
    }

    public function destroy(int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Utilisateur supprimé !',
            'user' => $this->userManager->delete(User::findOrFail($id))
        ], 200);
    }
}
