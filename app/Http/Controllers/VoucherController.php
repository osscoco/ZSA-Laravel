<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Managers\VoucherManager;

class VoucherController extends Controller
{
    protected $voucherManager;

    public function __construct(VoucherManager $voucherManager)
    {
        $this->voucherManager = $voucherManager;
    }

    public function index()
    {
        return response()->json(['vouchers' => Voucher::all()], 200);
    }

    public function store(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Utilisateur créé !',
            'voucher' => $this->voucherManager->create($request->all())
        ], 200);
    }

    public function show(int $id)
    {
        return response()->json(['voucher' => Voucher::findOrFail($id)], 200);
    }

    public function update(Request $request, int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Bon d\'achat mis à jour !',
            'voucher' => $this->voucherManager->update(Voucher::findOrFail($id), $request->all()),
        ], 200);
    }

    public function destroy(int $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Bon d\'achat supprimé !',
            'voucher' => $this->voucherManager->delete(Voucher::findOrFail($id))
        ], 200);
    }
}
