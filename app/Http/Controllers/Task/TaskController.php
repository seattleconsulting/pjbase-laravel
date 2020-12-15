<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @パッケージ : Task
 * @システム名 : pjbase-laravel案件
 */
class TaskController extends Controller
{
    /**
     * タスクサービスインターフェイスオブジェクト
     *
     * @var TaskServiceInterface
     */
    private $taskServiceInterface;

    /**
     * コンストラクタ
     *
     * @param TaskServiceInterface $taskServiceInterface
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskServiceInterface = $taskServiceInterface;
    }
        
    /**
     * タスク一覧を表示する
     *
     * @return \App\Models\Task
     */
    public function getAllList()
    {
        return $this->taskServiceInterface->getAllList();
    }
        
    /**
     * タスクを作成する
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $this->taskServiceInterface->create($request);
    }
        
    /**
     * タスクを表示する
     *
     * @param $id
     * @return \App\Models\Task
     */
    public function getTaskByid($id)
    {
        return $this->taskServiceInterface->getTaskByid($id);
    }
        
    /**
     * タスクを編集する
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return $this->taskServiceInterface->edit($request);
    }
        
    /**
     * タスクを削除する
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->taskServiceInterface->delete($id);
    }
}
