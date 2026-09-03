<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function switch(Request $request, string $locale): RedirectResponse
    {
        if (in_array($locale, ['en', 'sw'])) {
            Session::put('locale', $locale);
            cookie()->queue('locale', $locale, 60 * 24 * 365);
        }

        $referer = $request->headers->get('referer');
        if ($referer) {
            return redirect($referer)->withCookie(cookie('locale', $locale, 60 * 24 * 365));
        }

        return redirect()->route('home')->withCookie(cookie('locale', $locale, 60 * 24 * 365));
    }
}
