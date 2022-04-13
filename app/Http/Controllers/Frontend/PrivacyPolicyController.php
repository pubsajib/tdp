<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function HeadPrivacyPolicy(){
        return view('frontend.privacypolicy.privacypolisy');
    }

    public function TermsConditon(){
        return view('frontend.privacypolicy.termsncondition');
    }
}
