<?php

use Illuminate\Support\Facades\Broadcast;
Broadcast::channel('chat.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('presence-chat.{userId}', function ($user, $userId) {
    return [
        'id' => $user->id,
        'name' => $user->first_name,
    ];
});