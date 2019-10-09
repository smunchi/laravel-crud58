<?php


namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Repository\Users\UserRepository;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;

    }

    use ThrottlesLogins;

    public function login(LoginRequest $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($authorization = $this->userRepo->login($request)) {
            $this->clearLoginAttempts($request);
            return $this->json('Logged in successfully!', $authorization);
        }
        $this->incrementLoginAttempts($request);
        return $this->json('Invalid credentials', [], Response::HTTP_UNAUTHORIZED);
    }

    public function username()
    {
        return 'email';
    }

    protected function incrementLoginAttempts(Request $request)
    {
        $this->limiter()->hit(
            $this->throttleKey($request),
            $this->decayMinutes()
        );
    }


}