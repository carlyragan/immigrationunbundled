<?php

namespace App\Http\Middleware;

use Closure;
use App\Applicants;

class StepMover
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
        $applicants = Applicants::where('user_id', \Auth::id())->first();

        if (
            !is_null($applicants) &&
            !empty($applicants->current_step) &&
            $applicants->current_step !== $request->route()->getName()
        ) {
            return redirect(route($applicants->current_step));
        }

        return $next($request);
    }
}
