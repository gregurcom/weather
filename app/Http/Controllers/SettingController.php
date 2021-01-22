<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Services\SettingsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

final class SettingController extends Controller
{
    public function settings(SettingsRequest $request, SettingsService $settingsService): RedirectResponse|View
    {
        if ($request->isMethod('post')) {
            $settingsService->save($request->validated());

            return back()->with('status', __('validation.success'));
        }

        return view('settings', ['previousPage' => $request->from, 'query' => $request->q]);
    }
}
