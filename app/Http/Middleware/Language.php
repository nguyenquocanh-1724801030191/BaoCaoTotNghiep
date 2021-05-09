<?php

namespace App\Http\Middleware;
use Session;

use Closure;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

     /*    if(Session::has('language')){
            app()->setlocale(Session::get('language'));
        } */
        $language = Session::get('language', config('app.locale'));
        switch ($language) {
         case 'en':
             $language = 'en';
             break;
         
         default:
             $language = 'vi';
             break;
        }
        App()->setLocale($language);
        
        return $next($request);
    }
}
