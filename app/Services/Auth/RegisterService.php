<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\RegisterDaoInterface;
use App\Contracts\Services\Auth\RegisterServiceInterface;

/**
 * @パッケージ : Auth
 * @システム名 : pjbase-laravel案件
 */
class RegisterService implements RegisterServiceInterface
{
    /**
     * Daoインターフェースオブジェクト
     *
     * @var RegisterDaoInterface
     */
    private $registerDaoInterface;

    /**
     * コンストラクタ
     *
     * @param RegisterDaoInterface $registerDaoInterface
     */
    public function __construct(RegisterDaoInterface $registerDaoInterface)
    {
        $this->registerDaoInterface = $registerDaoInterface;
    }
        
    /**
     * メールをチェックする
     *
     * @param $request
     * @return \App\Models\User
     */
    public function checkEmail($request)
    {
        return $this->registerDaoInterface->checkEmail($request);
    }
        
    /**
     * ユーザー登録する
     *
     * @param $request
     * @return \App\Models\User
     */
    public function create($request)
    {
        return $this->registerDaoInterface->create($request);
    }
}
