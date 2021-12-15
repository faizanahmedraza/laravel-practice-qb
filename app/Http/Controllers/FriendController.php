<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $friends = Friend::whereSender(auth()->id())->orWhere(function ($q){
            $q->whereRecipient(auth()->id());
        })->get();
        return response()->json(['message' => 'Done!','data' => $friends]);
    }

    public function sendFriendRequest(Request $request)
    {
        Friend::create([
            'user_id' => auth()->id(),
            'friend_id' => $request->user,
            'status' => 'pending'
        ]);
        return response()->json(['message' => 'Done!']);
    }

    public function acceptFriendRequest($user)
    {
        Friend::whereSenderRecipient(auth()->id(),$user)->first()->update([
            'status' => 'accepted'
        ]);
        return response()->json(['message' => 'Done!']);
    }

    public function denyFriendRequest($user)
    {
        Friend::whereSenderRecipient(auth()->id(),$user)->first()->update([
            'status' => 'denied'
        ]);
        return response()->json(['message' => 'Done!']);
    }
}
