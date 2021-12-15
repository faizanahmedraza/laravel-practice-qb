<?php


namespace App\Traits;

use App\Models\User;

trait Friendable
{
    public function friendShipIStarted()
    {
        return $this->belongsToMany(User::class,'friendships','user_id','friend_id')->wherePivot('status','approved');
    }

    public function friendShipOtherStarted()
    {
        return $this->belongsToMany(User::class,'friendships','user_id','friend_id')->wherePivot('status','approved');
    }

    // access friends that a user was invited by
    public function friendRequests()
    {
        return $this->belongsToMany(User::class, 'friendships', 'friend_id', 'user_id')->withPivot('status','pending');
    }

    public function inFriend($user)
    {
        return $this->friends()->where('friend_id',$user)->where('status','approved')->exists();
    }
}