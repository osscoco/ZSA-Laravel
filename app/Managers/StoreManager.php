<?php


namespace App\Managers;

use App\Models\Store;
use Carbon\Carbon;

class StoreManager
{
    public function create(array $data)
    {
        $store = Store::create([
            'reference' => $data['reference'],
            'urlwebsite' => $data['urlwebsite'],
            'created_at' => Carbon::now(),
            'updated_at' => NULL
        ]);
        $store->save();
        return $store;
    }

    public function update(Store $store, array $request)
    {
        $data['updated_at'] = Carbon::now();
        $store = Store::where('id', $store->id)->update($request);
        return $store;
    }

    public function delete(Store $store)
    {
        $store = Store::where('id', $store->id)->delete();
    }
}
