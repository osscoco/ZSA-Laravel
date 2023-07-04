<?php


namespace App\Managers;

use App\Models\StoreMember;
use Carbon\Carbon;

class StoreMemberManager
{
    public function create(array $data)
    {
        $storeMember = StoreMember::create([
            'store_id' => $data['store_id'],
            'member_id' => $data['member_id'],
            'created_at' => Carbon::now(),
            'updated_at' => NULL
        ]);
        $storeMember->save();
        return $storeMember;
    }

    public function update(StoreMember $storeMember, array $request)
    {
        $data['updated_at'] = Carbon::now();
        $storeMember = StoreMember::where('id', $id)->update($request);
        return $storeMember;
    }

    public function delete(StoreMember $storeMember)
    {
        $storeMember = StoreMember::where('id', $storeMember->id)->delete();
    }
}
