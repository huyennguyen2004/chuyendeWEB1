<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
   public function index()
   {
      return view('frontend.policy');
   }

   public function purchasePolicy()
   {
      return view('frontend.policy_purchase');
   }

   public function warrantyPolicy()
   {
      return view('frontend.policy_warranty');
   }

   public function shippingPolicy()
   {
      return view('frontend..policy_shipping');
   }

   public function returnPolicy()
   {
      return view('frontend.policy_return');
   }
   public function privacyPolicy()
   {
      return view('frontend.privacy_policy');
   }
}
