<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\News;


class CheckPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $newsId = $request->route('id');

        $news = News::find($newsId);
    
        if ( $news->is_blocked === 0) {
            return $next($request);
        }
    
        abort(403, 'Леха съел новость с пивом');
    }
}
