<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
class Userrole {
    protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if($this->auth->check()){
            /*if( Auth::user()->change){
                return redirect('/password/reset/'.Auth::user()->name);
            }*/
            if($this->auth->user()->role==1){
                return $next($request);
            }else{
            	return response('Unauthorized.', 401);
            }
        }else{
            return redirect("/auth/login");
        }
		
	}

}
