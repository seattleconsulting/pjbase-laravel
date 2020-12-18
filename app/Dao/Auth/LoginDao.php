<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\LoginDaoInterface;
use App\Models\User;

/**
 * @パッケージ : Auth
 * @システム名 : pjbase-laravel案件
 */
class LoginDao implements LoginDaoInterface
{
    /**
    * トークンを取得する
    *
    * @param $request
    * @return \App\Models\User
    */
    public function getToken($request)
    {
        return User::select('name', 'email', 'token')
            ->where('email', $request->email)
            ->first();
    }
}
