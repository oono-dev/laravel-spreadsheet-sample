<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpreadSheetController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->writeSpreadSheet();

        return redirect()->route('spreadsheet.index');
    }
}
