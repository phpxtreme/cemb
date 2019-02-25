<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class ContratoController extends Controller
{
    public function view(Request $request)
    {
        return View::make('page.contrato.contrato');
    }
}
