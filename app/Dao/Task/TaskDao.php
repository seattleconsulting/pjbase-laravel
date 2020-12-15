<?php

namespace App\Dao\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Models\Task;

/**
 * @パッケージ : Task
 * @システム名 : pjbase-laravel案件
 */
class TaskDao implements TaskDaoInterface
{

    /**
     * タスク一覧を表示する
     *
     * @return \App\Models\Task
     */
    public function getAllList()
    {
        return Task::select('id', 'task_name')
            ->where('del_flg', '!=', 1)
            ->get();
    }
        
    /**
     * タスクを作成する
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        return Task::insert([
            'task_name' => $request->task_name,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);
    }
        
    /**
    * タスクを表示する
    *
    * @param $id
    * @return \Illuminate\Http\Response
    */
    public function getTaskByid($id)
    {
        return Task::select('id', 'task_name')
            ->where('id', $id)
            ->first();
    }
        
    /**
     * タスクを編集する
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function edit($request)
    {
        return Task::where('id', $request->id)->update([
            'task_name' => $request->task_name
        ]);
    }
    
    /**
     * タスクを削除する
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return Task::where('id', $id)->update([
            'del_flg' => 1
        ]);
    }
}
