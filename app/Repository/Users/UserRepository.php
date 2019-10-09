<?php

namespace App\Repository\Users;

use App\Repository\Repository;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository
{
    public function model()
    {
        return User::class;
    }

    public function findByEmail(string $email)
    {
        return $this->model()::where('email', $email)->first();
    }

    public function login($request)
    {
        $user = $this->findByEmail($request->email);

        if (!is_null($user) && Hash::check($request->password, $user->password)) {
            return [
                'user' => new \App\Http\Resources\Api\User\User($user),
                'access' => $this->generateToken($user)
            ];
        }
        return false;
    }

    public function generateToken(User $user): array
    {
        $token = $user->createToken('user token');

        return [
            'auth_type' => 'Bearer',
            'token' => $token->accessToken,
            'expires_at' => $token->token->expires_at->format('Y-m-d H:i:s'),
        ];
    }
}
