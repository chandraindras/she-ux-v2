<?php
namespace App\Http\Middleware;

use Jenssegers\Agent\Agent;

class NonMobileSupportMiddleware 
{
	private $agent;

	public function _construct(Agent $agent)
	{
		$this->agent = $agent;
	}

	public function handle(Request $request, Closure $next)
	{
		// $mobile = $this->agent->isMobile();
		// $tablet = $this->agent->isTable();
		// if($mobile || $tablet) {
		// 		return redirect()->route( route: auth()->guard( name: 'web' )->check() ? 'tenant.not-supported' : 'visitor.not-supported');
		// }
		return $next($request);
	}
}
?>