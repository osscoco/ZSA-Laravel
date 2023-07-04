<?php


namespace App\Managers;

use App\Models\Voucher;
use Carbon\Carbon;

class VoucherManager
{
    public function create(array $data)
    {
        if ($data['card_id']) {

            $voucher = Voucher::create([
                'reference' => $data['reference'],
                'value' => $data['value'],
                'code' => $data['code'],
                'expiration_date' => $data['expiration_date'],
                'card_id' => $data['card_id'],
                'created_at' => Carbon::now(),
                'updated_at' => NULL
            ]);

        } else {

            $voucher = Voucher::create([
                'reference' => $data['reference'],
                'value' => $data['value'],
                'code' => $data['code'],
                'expiration_date' => $data['expiration_date'],
                'card_id' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => NULL
            ]);
        }

        $voucher->save();
        return $voucher;
    }

    public function update(Voucher $voucher, array $request)
    {
        $data['updated_at'] = Carbon::now();
        $voucher = Voucher::where('id', $voucher->id)->update($request);
        return $voucher;
    }

    public function delete(Voucher $voucher)
    {
        $voucher = Voucher::where('id', $voucher->id)->delete();
    }
}
