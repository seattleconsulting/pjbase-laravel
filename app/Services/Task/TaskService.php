<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;

/**
 * @パッケージ : Task
 * @システム名 : pjbase-laravel案件
 */
class TaskService implements TaskServiceInterface
{
    /**
     * Daoインターフェースオブジェクト
     *
     * @var TaskDaoInterface
     */
    private $taskDaoInterface;

    /**
     * コンストラクタ
     *
     * @param TaskDaoInterface $taskDaoInterface
     */
    public function __construct(TaskDaoInterface $taskDaoInterface)
    {
        $this->taskDaoInterface = $taskDaoInterface;
    }
        
    /**
     * タスク一覧を表示する
     *
     * @return \App\Models\Task
     */
    public function getAllList()
    {
        return $this->taskDaoInterface->getAllList();
    }
        
    /**
     * タスクを作成する
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        return $this->taskDaoInterface->create($request);
    }
        
    /**
     * タスクを表示する
     *
     * @param $id
     * @return \App\Models\Task
     */
    public function getTaskByid($id)
    {
        return $this->taskDaoInterface->getTaskByid($id);
    }
        
    /**
     * タスクを編集する
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function edit($request)
    {
        return $this->taskDaoInterface->edit($request);
    }
        
    /**
     * タスクを削除する
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->taskDaoInterface->delete($id);
    }
}
