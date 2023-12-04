<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('private-chat.{userId1}.{userId2}', function ($user, $userId1, $userId2) {
    // Implement your authentication logic here
    // Example logic: Check if the authenticated user is part of the conversation
    // if ($user->id == $userId1 || $user->id == $userId2) {
    //     return ['id' => $user->id, 'name' => $user->name];
    // }

    // return null;
    return true;
});