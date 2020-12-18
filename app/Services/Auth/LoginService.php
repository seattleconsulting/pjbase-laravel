<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\LoginDaoInterface;
use App\Contracts\Services\Auth\LoginServiceInterface;

/**
 * @パッケージ : Auth
 * @システム名 : pjbase-laravel案件
 */
class LoginService implements LoginServiceInterface
{
    /**
     * Daoインターフェースオブジェクト
     *
     * @var LoginDaoInterface
     */
    private $loginDaoInterface;

    /**
     * コンストラクタ
     *
     * @param LoginDaoInterface $loginDaoInterface
     */
    public function __construct(LoginDaoInterface $loginDaoInterface)
    {
        $this->loginDaoInterface = $loginDaoInterface;
    }
        
    /**
     * トークンを取得する
     *
     * @param $request
     * @return \App\Models\User
     */
    public function getToken($request)
    {
        return $this->loginDaoInterface->getToken($request);
    }
}
