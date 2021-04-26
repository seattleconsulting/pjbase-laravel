<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @パッケージ : Task
 * @システム名 : pjbase-laravel案件
 */
/**
 * @OA\Info(
 *    title="Your super  ApplicationAPI",
 *    version="1.0.0",
 * )
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
     * @OA\Get(
     *      path="/api/tasks",
     *      operationId="getTaskList",
     *      tags={"Tasks"},
     *      summary="Get list of tasks",
     *      description="Returns list of tasks",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Task")
     *       )
     *     )
     * @return \App\Models\Task
     */
    public function getAllList()
    {
        return $this->taskServiceInterface->getAllList();
    }
        
    /**
     * タスクを作成する
     * @OA\Post(
     *      path="/api/tasks",
     *      operationId="createTask",
     *      tags={"Tasks"},
     *      summary="Create new task",
     *      description="Returns created task info",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="task_name",
     *                     description="タスク名",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Task")
     *       )
     *     )
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
     * @OA\Get(
     *      path="/api/tasks/{id}",
     *      operationId="getTaskById",
     *      tags={"Tasks"},
     *      summary="Get task info by id",
     *      description="Returns target task info",
     *      @OA\Parameter(
     *          name="id",
     *          description="Task id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Task")
     *       )
     *     )
     * @param $id
     * @return \App\Models\Task
     */
    public function getTaskByid($id)
    {
        return $this->taskServiceInterface->getTaskByid($id);
    }
        
    /**
     * タスクを編集する
     * @OA\Put(
     *      path="/api/tasks",
     *      operationId="editTask",
     *      tags={"Tasks"},
     *      summary="Update task",
     *      description="Returns updated task info",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     description="タスクID",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="task_name",
     *                     description="タスク名",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Task")
     *       )
     *     )
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
     * @OA\Delete(
     *      path="/api/tasks/{id}",
     *      operationId="removeTask",
     *      tags={"Tasks"},
     *      summary="Delete task",
     *      @OA\Parameter(
     *          name="id",
     *          description="Task id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Task")
     *       )
     *     )
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->taskServiceInterface->delete($id);
    }
}
