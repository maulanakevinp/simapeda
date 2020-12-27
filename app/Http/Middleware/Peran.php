<?php

namespace App\Http\Middleware;

use App\PeranMenu;
use App\Submenu;
use Closure;

class Peran
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
        foreach (PeranMenu::where('peran_id', auth()->user()->peran_id)->get() as $peran_menu) {
            foreach ($peran_menu->peran_menu_submenu as $item) {
                if ($item->submenu->url == request()->segment(1)) {
                    return $next($request);
                }
            }
        }

        return abort(403);
    }
}
