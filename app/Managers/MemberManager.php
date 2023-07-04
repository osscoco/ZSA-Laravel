<?php


namespace App\Managers;

use App\Models\Member;
use Carbon\Carbon;

class MemberManager
{
    public function create(array $data)
    {
        if ($data['card_id']) {

            $member = Member::create([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'card_id' => $data['card_id'],
                'created_at' => Carbon::now(),
                'updated_at' => NULL
            ]);

        } else {

            $member = Member::create([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'card_id' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => NULL
            ]);
        }

        $member->save();
        return $member;
    }

    public function update(Member $member, array $request)
    {
        $data['updated_at'] = Carbon::now();
        $member = Member::where('id', $member->id)->update($request);
        return $member;
    }

    public function delete(Member $member)
    {
        $member = Member::where('id', $member->id)->delete();
    }
}
