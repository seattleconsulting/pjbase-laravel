<?php

namespace App\Contracts\Dao\Auth;

/**
 * @パッケージ : Auth
 * @システム名 : pjbase-laravel案件
 */
interface LoginDaoInterface
{
    /**
    * トークンを取得する
    *
    * @param $request
    * @return \App\Models\User
    */
    public function getToken($request);
}
