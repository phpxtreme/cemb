<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class FacturaController extends Controller
{
    public function view(Request $request)
    {
        return View::make('page.factura.factura');
    }
}
