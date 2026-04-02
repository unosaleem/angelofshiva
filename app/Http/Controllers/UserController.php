<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\UserActivity;
use Carbon\Carbon;
use DB;
use Jenssegers\Agent\Agent;

class UserController extends Controller
{




    public function profile(Request $request)
    {
        $user = Auth::user();

        $daysActive = Carbon::parse($user->created_at)->diffInDays(now());
        $favoritesCount = $user->favorites()->count();

        // Current session id
        $currentSessionId = session()->getId();

        // Fetch sessions from DB
        $sessions = DB::table('sessions')
            ->where('user_id', $user->id)
            ->orderByDesc('last_activity')
            ->get()
            ->map(function ($session) use ($currentSessionId) {

                $agent = $session->user_agent ?? '';

                // Browser detect
                $browser = 'Unknown';
                if (str_contains($agent, 'Chrome')) $browser = 'Chrome';
                elseif (str_contains($agent, 'Firefox')) $browser = 'Firefox';
                elseif (str_contains($agent, 'Safari') && !str_contains($agent, 'Chrome')) $browser = 'Safari';
                elseif (str_contains($agent, 'Edge')) $browser = 'Edge';

                // Platform detect
                $platform = 'Unknown';
                if (str_contains($agent, 'Windows')) $platform = 'Windows';
                elseif (str_contains($agent, 'Mac')) $platform = 'Mac';
                elseif (str_contains($agent, 'Android')) $platform = 'Android';
                elseif (str_contains($agent, 'iPhone')) $platform = 'iPhone';
                elseif (str_contains($agent, 'Linux')) $platform = 'Linux';

                return (object)[
                    'id' => $session->id,
                    'ip_address' => $session->ip_address,
                    'browser' => $browser,
                    'platform' => $platform,
                    'is_current' => $session->id === $currentSessionId,
                    'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
                ];
            });

        return view('user.profile', compact(
            'user',
            'daysActive',
            'favoritesCount',
            'sessions'
        ));
    }

    public function favorites()
    {
        $user = Auth::user();

        // assuming you have favorites table
        $favorites = Favorite::where('user_id', $user->id)->latest()->get();

        return view('user.favorites', compact('favorites'));
    }
}
