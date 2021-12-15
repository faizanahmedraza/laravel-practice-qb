<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "friendships";

    public function scopeWhereSender(Builder $query,$user)
    {
        return $query->where('user_id',$user);
    }

    public function scopeWhereRecipient(Builder $query,$user)
    {
        return $query->where('friend_id',$user);
    }

    public function scopeWhereSenderRecipient(Builder $query,$sender,$recipient)
    {
        return $query->where(function ($queryIn) use ($sender,$recipient){
            $queryIn->where(function ($q) use($sender,$recipient) {
                $q->whereSender($sender)->whereRecipient($recipient);
            })->orWhere(function ($q) use ($sender,$recipient){
                $q->whereSender($recipient)->whereRecipient($sender);
            });
        });
    }
}
