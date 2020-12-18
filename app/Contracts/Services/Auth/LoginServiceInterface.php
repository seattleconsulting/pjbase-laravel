<?php

namespace App\Contracts\Services\Auth;

/**
 * @パッケージ : Auth
 * @システム名 : pjbase-laravel案件
 */
interface LoginServiceInterface
{
    /**
    * トークンを取得する
    *
    * @param $request
    * @return \App\Models\User
    */
    public function getToken($request);
}
