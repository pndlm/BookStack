<?php

namespace BookStack\Http\Controllers\Auth;

use Bookstack\Auth\User;
use BookStack\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function handle(Request $request) {
        $token = $request->get('token');
        $path = $request->get('redirect');
        $now = Carbon::now()->timestamp;

        $user = User::where('external_auth_id', $token)->where('expires_at', '>=', $now)->first();

        if ($user) {
            Auth::login($user);
        } else {
            abort(403, 'Invalid Token');
        }

        return redirect()->to($path);
    }
}
