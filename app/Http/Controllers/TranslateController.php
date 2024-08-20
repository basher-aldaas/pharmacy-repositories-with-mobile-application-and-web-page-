<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranslateController extends Controller
{
    public function translate(Request $request){

        $tr = new GoogleTranslate('en');
    return $tr->setSource("en")->setTarget("ar")->translate($request);

    }
}
