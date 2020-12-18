<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\RegisterDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @パッケージ : Auth
 * @システム名 : pjbase-laravel案件
 */
class RegisterDao implements RegisterDaoInterface
{
    /**
     * メールをチェックする
     *
     * @param $request
     * @return \App\Models\User
     */
    public function checkEmail($request)
    {
        return User::where('email', $request['email'])->first();
    }
        
    /**
     * ユーザーを作成する
     *
     * @param $request
     * @return \App\Models\User
     */
    public function create($request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'token' => Str::random(60),
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);
    }
}
