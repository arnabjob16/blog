<?php
namespace App\Repositories\User;
use App\Models\User;
class UserRepoImpl implements UserRepo {
	public function list($notInIds){
        $user = User::query();
        if (!empty($notInIds)) {
            $user->whereNotIn('id', $notInIds);
        }
		return $user->get();
	}
    public function details($userId)
    {
        return User::where('id', $userId)->first();
    }
}