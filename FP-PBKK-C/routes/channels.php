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
    return (int) $user->id === (int) $userId1 || (int) $user->id === (int) $userId2;
 });
 