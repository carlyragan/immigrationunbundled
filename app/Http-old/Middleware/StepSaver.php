<?php

namespace App\Http\Middleware;

use Closure;
use App\Applicants;

class StepSaver
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
        $apply = $next($request);

        $applicants = Applicants::where('user_id', \Auth::id())->first();

        if (!is_null($applicants)) {
            $applicants->current_step = $request->route()->getName();
            $applicants->save();
        }

        return $apply;
    }
}
