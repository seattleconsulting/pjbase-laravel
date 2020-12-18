<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\Auth\RegisterServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

/**
 * @パッケージ : Task
 * @システム名 : pjbase-laravel案件
 */
class RegisterController extends Controller
{
    /**
    *　登録サービスインターフェイスオブジェクト
    *
    * @var RegisterServiceInterface
    */
    private $registerServiceInterface;

    /**
     * コンストラクタ
     *
     * @param RegisterServiceInterface $registerServiceInterface
     */
    public function __construct(RegisterServiceInterface $registerServiceInterface)
    {
        $this->registerServiceInterface = $registerServiceInterface;
    }

    /**
    * ユーザー登録する
    *
    * @param Request $request
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        // メールをチェックする
        $result = $this->registerServiceInterface->checkEmail($request);
        if ($result) {
            return Response::json(['error' => 'このメールアドレスはすでに使用されています。'], 404);
        }

        // ユーザーを作成する
        return $this->registerServiceInterface->create($request);
    }
}
