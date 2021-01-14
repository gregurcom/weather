<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function weatherSettings(Request $request)
    {
        if ($request->has('settings-button')) {
            $request->session()->put([
                'temperature' => $request->temperature,
                'pressure' => $request->pressure,
                'speed' => $request->speed,
                'precipitation' => $request->precipitation,
            ]);

            return back()->with('status', 'You have successfully changed the settings');
        }
        if ($request->from) {
            return view('settings', ['previousPage' => $request->from, 'query' => $request->q]);
        } else {
            return redirect()->route('home');
        }
    }
}
