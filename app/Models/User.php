<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @OA\Schema(
 * @OA\Property(property="id", type="integer", format="int32", description="ID autoincrement"),
 * @OA\Property(property="name", type="string", description="タスク名"),
 * @OA\Property(property="email", type="string", format="", description="削除フラグ"),
 * @OA\Property(property="password", type="string", format="int32", description="パスワード"),
 * @OA\Property(property="created_at", type="string", format="date-time", description="Initial creation timestamp"),
 * @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp"),
 * )
 * @package App\Models
 */
class User extends Authenticatable
{
    use Notifiable;
    
    /**
    * Testing DBのuserテーブル
    */
    protected $table = 'users';

    /**
    * Testing DBのuserテーブルのPrimaryKey
    */
    protected $primaryKey = 'id';
        
    /*
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id', 'name', 'email', 'password','token'
    ];
        
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}
