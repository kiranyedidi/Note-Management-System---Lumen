<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateUser
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
      // Checking if the session exists, If yes, allowing the request to the requested page else redirecting to the login page
      if(is_null($request->session()->get('id'))){
        return redirect('/');
      }

      // Middleware to handle browsers back button issue, which will be called when the response is being sent to the user
      $response = $next($request);
      // Clearing the back button cache
      return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
                      ->header('Pragma','no-cache')
                      ->header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
    }
}
