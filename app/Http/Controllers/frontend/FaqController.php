<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        return view('frontend.faq');
    }
}
