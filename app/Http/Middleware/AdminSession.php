<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request;
class AdminSession { public function handle(Request $request, Closure $next){return $request->session()->has('kafeno_admin_id')?$next($request):redirect()->route('admin.login');} }
