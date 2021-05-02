<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request): RedirectResponse|View
    {
        $city = Subscription::where('user_id', Auth::id())->where('name', $request->city)->first();

        if ($city === null) {
            Subscription::create([
                'name' => $request->city,
                'user_id' => Auth::id(),
            ]);

            return back()->with('status', __('app.alert.subscribe_city'));
        }

        return back()->with('status', __('app.alert.already_subscribe'));
    }

    public function subscriptionRemove(Request $request): RedirectResponse
    {
        Subscription::where('user_id', Auth::id())->where('name', $request->city)->delete();

        return back();
    }
}
