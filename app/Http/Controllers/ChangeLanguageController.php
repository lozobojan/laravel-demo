<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChangeLanguageController extends Controller
{
    public function __invoke(Request $request, $locale)
    {
        Session::put('locale', $locale);
        Session::save();

        return redirect()->back();
    }
}
