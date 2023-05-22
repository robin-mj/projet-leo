<?php

namespace App\Http\Controllers;

use App\Actions\CalculateTesterScore;
use App\Models\Form;
use App\Models\Tester;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show(Request $request)
    {
        return view('form', [
            'token' => $request->route('token'),
        ]);
    }

    public function store(Request $request)
    {
        $score = (new CalculateTesterScore())->execute();
        $tester = Tester::firstWhere('form_token', $request->token);
        $tester->update([
            'score' => $score,
        ]);

        return redirect()->back()->with('success', 'Form submitted successfully');
    }
}
