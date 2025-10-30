<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     *
     * @param Request $request
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch(Request $request, $locale)
    {
        // Check if the locale is supported
        if (! in_array($locale, ['en', 'de'])) {
            abort(400);
        }

        // Store the locale in session
        Session::put('locale', $locale);

        // Set the application locale
        App::setLocale($locale);

        // Redirect back to the previous page
        return redirect()->back();
    }

    /**
     * Get current locale for AJAX requests
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurrentLocale()
    {
        return response()->json([
            'locale' => App::getLocale()
        ]);
    }
}
