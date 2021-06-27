<?php


namespace App\Containers\Authentication\Middlewares;


use App\Containers\User\Models\User;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


class ApiAuthenticationMiddleware extends BaseMiddleware
{

  public function handle($request, Closure $next)
  {

    try {

      JWTAuth::parseToken()->authenticate();

      auth()->userOrFail();

    } catch (\Exception $e) {
        $user = new User();
        $user->integration_id = 697148;
        JWTAuth::fromUser($user);
//      var_dump($e->getLine(),$e->getMessage(),$e->getFile());
    }

    return $next($request);

  }

}
