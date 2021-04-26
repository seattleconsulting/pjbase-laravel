<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 * @OA\Property(property="id", type="integer", format="int32", description="ID autoincrement"),
 * @OA\Property(property="task_name", type="string", description="タスク名"),
 * @OA\Property(property="del_flg", type="integer", format="int32", description="削除フラグ"),
 * @OA\Property(property="created_at", type="string", format="date-time", description="Initial creation timestamp"),
 * @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp"),
 * )
 * @package App\Models
 */
class Task extends Model
{
    /**
    * Testing DBのtaskテーブル
    */
    protected $table = 'task';

    /**
    * Testing DBのtaskテーブルのPrimaryKey
    */
    protected $primaryKey = 'id';
}
