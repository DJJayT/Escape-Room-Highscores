<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BadgeController {

    public function createBadgeView() {
        return view('badges.create_badge');
    }

    public function createBadge(Request $request): RedirectResponse {

        $request->validate([
            'name' => 'required|max:30',
        ]);

        Badge::create([
            'name' => $request->input('name'),
        ]);

        return redirect()
            ->route('home')
            ->with('success', __('badge.success'));

    }


}
