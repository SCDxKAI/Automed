<?php
namespace Simcify\Middleware;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Simcify\Database;
use Simcify\Auth;

class Authenticate implements IMiddleware {

    /**
     * Redirect the user if they are unautenticated
     * 
     * @param   \Pecee\Http\Request $request
     * @return  \Pecee\Http]Request
     */
    public function handle(Request $request) : void {

        Auth::remember();
        
        if (Auth::check()) {
            $request->user = Auth::user();
            $company = Database::table("companies")->where("id", $request->user->company)->first();
            
            // Set the locale to the user's preference
            config('app.locale.default', $request->user->{config('auth.locale')});
            date_default_timezone_set( $company->timezone );

            Database::table("companies")->where("id", $request->user->company)->update(array("last_activity" => "NOW()"));

        } else {
            $request->setRewriteUrl(url('Auth@get'));
        }

    }
}
