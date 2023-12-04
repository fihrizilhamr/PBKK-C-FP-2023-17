<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use App\Models\Chat;
use App\Models\Member;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PusherController extends Controller
{
    public function auth(Request $request)
    {
        $user = $request->user();
        
        if ($user) {
            return json_decode((string) $user->id);
        } else {
            return json_decode(response('Unauthorized.', 401));
        }
    }
    

    public function index($userId1, $userId2)
    {
        $user = User::find(auth()->id());
        $user1 = User::find($userId1);
        $user2 = User::find($userId2);
        $check =($user == $user1) ? 0 : 1;
        $enemy = ($user == $user1) ? $user2 : $user1;
        $gambar = "default.png";
        if ($check == 0) {
            $gambar = $user2->trainer->Foto;
        }
        return view('mychat', [
            'userId1' => $userId1,
            'userId2' => $userId2,
            'check' => $check,
            'lawanBicara' => $enemy,
            'gambar' =>$gambar,
        ]);
    }

    public function broadcast(Request $request, $userId1, $userId2)
    {
        $user = User::find(auth()->id());
        $user1 = User::find($userId1);
        $user2 = User::find($userId2);
        $check =($user == $user1) ? 0 : 1;
        $enemy = ($user == $user1) ? $user2 : $user1;
        $gambar = "default.png";
        if ($check == 1) {
            $gambar = $user2->trainer->Foto;
        }

        broadcast(new PusherBroadcast($request->get('message'), $request->get('timestamp'), $userId1, $userId2))->toOthers();

        return view('broadcast', ['message' => $request->get('message'), 'timestamp' => $request->get('timestamp'), 'gambar' => $gambar]);
    }

    public function receive(Request $request, $userId1, $userId2)
    {
        $user = User::find(auth()->id());
        $user1 = User::find($userId1);
        $user2 = User::find($userId2);
        $check =($user == $user1) ? 0 : 1;
        $enemy = ($user == $user1) ? $user2 : $user1;
        $gambar = "default.png";
        if ($check == 0) {
            $gambar = $user2->trainer->Foto;
        }
        return view('receive', ['message' => $request->get('message'), 'timestamp' => $request->get('timestamp'), 'gambar' => $gambar]);
    }

    public function createChat($trainer)
    {
        $user = User::find(auth()->id())->member;
        $trainerModel = Trainer::find($trainer);
    
        // Check if a chat entry already exists
        $existingChat = Chat::where('trainer_id', $trainerModel->user->id)
                            ->where('member_id', $user)
                            ->first();
    
        // If no existing chat entry, create a new one
        if (!$existingChat) {
            $results = [
                'trainer_id' => $trainerModel->id,
                'member_id' => $user->id,
            ];
    
            Chat::create($results);
        }
    
        return Redirect::route('list-chats');
    }

    public function listChat()
    {
    $user = User::find(auth()->id());

    $existingTrainerChat = collect([]);
    if ($user->member) {
        $existingTrainerChat = Chat::with('member.user')
            ->where('member_id', $user->member->id)
            ->get();
    }

    $existingMemberChat = collect([]);
    if ($user->trainer) {
        $existingMemberChat = Chat::with('trainer.user')
            ->where('trainer_id', $user->trainer->id)
            ->get();
    }
    // $existingMemberChat=Chat::All();
    // $existingTrainerChat=Chat::All();
    return view('list-chats', compact('existingTrainerChat', 'existingMemberChat'));
    }



    
    

}
