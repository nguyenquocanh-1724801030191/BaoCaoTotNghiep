<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function dashboard(Request $request, $language){
      /*  if($language){
           Session::put('languahe',$language);
       }
       return redirect()->back(); */
        $lang = $request->language;
        $language = config('app.locale');
        if ($lang == 'en') {
            $language = 'en';
        }
        if ($lang == 'vi') {
            $language = 'vi';
        }
        Session::put('language', $language);
        return redirect()->back();
            }
}
