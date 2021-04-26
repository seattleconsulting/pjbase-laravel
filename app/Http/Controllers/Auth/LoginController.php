<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\Auth\LoginServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
        
    /**
    *　ログインサービスインターフェイスオブジェクト
    *
    * @var LoginServiceInterface
    */
    private $loginServiceInterface;

    /**
     * コンストラクタ
     *
     * @param LoginServiceInterface $loginServiceInterface
     */
    public function __construct(LoginServiceInterface $loginServiceInterface)
    {
        $this->loginServiceInterface = $loginServiceInterface;
        $this->middleware('guest')->except('logout');
    }
        
    /**
     * アプリケーションへのログイン要求を処理する
     * @OA\Post(
     *      path="/api/login",
     *      operationId="login",
     *      tags={"Users"},
     *      summary="Login",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
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
     *             )
     *         )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       )
     *     )
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $result = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($result) {
            return $this->loginServiceInterface->getToken($request);
        }
        return Response::json(['error' => 'メルアドラスとパスワードが一致しません。'], 404);
    }

    /**
     * ログアウトする
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return Response::json(['status' => 200]);
    }
}
