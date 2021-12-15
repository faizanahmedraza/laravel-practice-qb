<?php


namespace App\Traits;

use App\Models\User;

trait Friendable
{
    public function friends()
    {
        $friends = $this->friendShipIStarted()->get();
        return $friends->merge($this->friendShipOtherStarted()->get());
    }

    public function friendShipIStarted($status = 'accepted')
    {
        return $this->belongsToMany(User::class,'friendships','user_id','friend_id')->wherePivot('status',$status);
    }

    public function friendShipOtherStarted($status = 'accepted')
    {
        return $this->belongsToMany(User::class,'friendships','friend_id','user_id')->wherePivot('status',$status);
    }

    public function friendRequests($status = 'pending')
    {
        $frequest = $this->friendShipIStarted($status)->get();
        return $frequest->merge($this->friendShipOtherStarted($status)->get());
    }

    public function inFriend($user)
    {
        $fi = $this->friendShipIStarted()->where('friend_id',$user)->count();
        $oi = $this->friendShipOtherStarted()->where('user_id',$user)->count();
        if($fi || $oi) { return true; }
        return false;
    }
}