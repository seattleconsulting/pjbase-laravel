<?php

namespace App\Contracts\Dao\Auth;

/**
 * @パッケージ : Auth
 * @システム名 : pjbase-laravel案件
 */
interface RegisterDaoInterface
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
