<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckInputController extends Controller
{
    public function index (Request $request) {
        return view('checkInput.index', [
            'title' => 'Check Input',
        ]);
    }

    public function process (Request $request) {
        $input1 = $request->input('input1');
        $input1Split = str_split($input1);
        $input2 = $request->input('input2');

        $count = 0; 
        foreach ($input1Split as $data) {
            $count += substr_count(strtolower($input2), strtolower($data));
        }
        if ($count >= 5) {
            $text = '100% matches';
        } else if ($count >= 4) {
            $text = '80% matches';
        } else if ($count >= 3) {
            $text = '60% matches';
        } else if ($count >= 2) {
            $text = '40% matches';
        } else if ($count >= 1) {
            $text = '20% matches';
        } else {
            $text = '0% matches';
        }

        return redirect()->back()->with('success', "Input 2 ($input2) has $text with input 1 ($input1)");
    }
}
