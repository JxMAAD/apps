<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function index()
    {
        return view('Calc');
    }

    public function Result(Request $request)
    {
        $number1 = $request->input('number1');
        $number2 = $request->input('number2');
        $operation = $request->input('operation');
        $result = null;

        switch ($operation) {
            case 'add':
                $result = $number1 + $number2;
                break;
            case 'subtract':
                $result = $number1 - $number2;
                break;
            case 'multiply':
                $result = $number1 * $number2;
                break;
            case 'divide':
                if ($number2 != 0) {
                    $result = $number1 / $number2;
                } else {
                    return redirect()->back()->with('error', 'Tidak bisa membagi dengan angka nol (0).');
                }
                break;
            default:
                return redirect()->back()->with('error', 'Operasi tidak valid.');
        }

        return view('Calc', compact('result', 'number1', 'number2', 'operation'));
    }
}
