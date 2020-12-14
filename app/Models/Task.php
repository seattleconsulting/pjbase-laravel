<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
    * Testing DBのtaskテーブル
    */
    protected $table = 'task';

    /**
    * Task DBのtaskテーブルのPrimaryKey
    */
    protected $primaryKey = 'id';
}
