<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request): RedirectResponse
    {
        $subscription = Subscription::where('user_id', Auth::id())->where('name', $request->city)->first();

        if (!$subscription) {
            Subscription::create([
                'name' => $request->city,
                'user_id' => Auth::id(),
            ]);

            return back()->with('status', __('app.alert.subscribe_city'));
        }

        return back()->with('status', __('app.alert.already_subscribe'));
    }

    public function remove(Request $request): RedirectResponse
    {
        Subscription::where('user_id', Auth::id())->where('name', $request->city)->delete();

        return back();
    }
}
