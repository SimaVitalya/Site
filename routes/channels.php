<?php

//    Broadcast::channel('App.User.{id}', function ($user, $id) {
//        return (int) $user->id === (int) $id;
//    });
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat', function ($user) {
    return true;
});
