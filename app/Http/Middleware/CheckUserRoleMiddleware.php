<?php
namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roleId = 2;
        // if ($roleId) {
        //     dd($roleId);
        // }
        // dd($request->user_id, $roleId);
        if ($request->user_id || $roleId) {
            // $userRole = Role::where("id", $request->user_id)->first();
            $userRole = Role::find($request->user_id ?? $roleId);
            // dd($userRole->name);
            if ($userRole->name === 'administrator') {
                return $next($request);
            }
            return redirect()->route('crud.trash')->withErrors(['msg' => "Ištrinti nepavyko arba parodyti, nes Jūsų teisės gaidiškos: {$userRole->name}."]);
        } else {
            return abort(403, "Kažkoks gaidys. Suveikė middleware. Neturite teisių. Neperduotas user_id laukas su role -> 1");
        }

    }
}
