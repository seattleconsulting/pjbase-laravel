<?php

namespace App\Contracts\Services\Auth;

/**
 * @パッケージ : Auth
 * @システム名 : pjbase-laravel案件
 */
interface RegisterServiceInterface
{
    /**
     * メールをチェックする
     *
     * @param $request
     * @return \App\Models\User
     */
    public function checkEmail($request);
        
    /**
     * ユーザー登録する
     *
     * @param $request
     * @return \App\Models\User
     */
    public function create($request);
}
