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
    * @OA\Post(
    *      path="/api/register",
    *      operationId="createTask",
    *      tags={"Users"},
    *      summary="Create new user",
    *      description="Returns created user info",
    *      @OA\RequestBody(
    *         required=true,
    *         @OA\MediaType(
    *             mediaType="application/x-www-form-urlencoded",
    *             @OA\Schema(
    *                 type="object",
    *                 @OA\Property(
    *                     property="name",
    *                     description="名前",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="email",
    *                     description="E-Mail",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="password",
    *                     description="パスワード",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="password_confirmation",
    *                     description="パスワード確認",
    *                     type="password"
    *                 )
    *             )
    *         )
    *     ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *          @OA\JsonContent(ref="#/components/schemas/User")
    *       )
    *     )
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
