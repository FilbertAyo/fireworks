<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display the settings dashboard.
     */
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'faq');

        $faqs = collect();
        if ($tab === 'faq') {
            $faqs = Faq::orderBy('question')->get();
        }

        return view('settings.index', [
            'activeTab' => $tab,
            'faqs' => $faqs,
        ]);
    }
}

