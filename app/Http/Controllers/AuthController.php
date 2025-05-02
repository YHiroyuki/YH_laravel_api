<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class AuthController extends Controller
{
    //
    //
    public function signup(Request $request)
    {
        $uuid = Str::uuid();
        $newPlayer = Player::create([
            'uuid' => $uuid,
        ]);

        return response()->json(['id' => $newPlayer->id, 'token' => $newPlayer->created_at->timestamp], 200);
    }

    public function signin(Request $request)
    {
        /** @var \Symfony\Component\HttpFoundation\InputBag $input */
        $input = $request->json();
        $idToken = $input->get('id_token');
        return response()->json(['id_token' => $idToken], 200);
    }
}
