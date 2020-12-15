<?php

namespace App\Contracts\Dao\Task;

/**
 * @パッケージ : Task
 * @システム名 : pjbase-laravel案件
 */
interface TaskDaoInterface
{
    /**
     * タスク一覧を表示する
     *
     * @return \App\Models\Task
     */
    public function getAllList();
        
    /**
     * タスクを作成する
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function create($request);
        
    /**
     * タスクを表示する
     *
     * @param $id
     * @return \App\Models\Task
     */
    public function getTaskByid($id);
        
    /**
     * タスクを編集する
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function edit($request);
        
    /**
     * タスクを削除する
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id);
}
