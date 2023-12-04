<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function index()
    {
        return view('mychat');
    }

    public function broadcast(Request $request)
    {
        broadcast(new PusherBroadcast($request->get('message'), $request->get('timestamp')))->toOthers();



        return view('broadcast', ['message' => $request->get('message'), 'timestamp' => $request->get('timestamp')]);
    }

    public function receive(Request $request)
    {
        return view('receive', ['message' => $request->get('message'), 'timestamp' => $request->get('timestamp')]);
    }
}
