<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return TodoCollection
     */
    public function index(): TodoCollection
    {
        $items = Todo::latest()->get();

        return new TodoCollection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTodoRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function store(StoreTodoRequest $request): JsonResponse
    {
        try {
            $inputs = $request->only('task', 'completed_at');
            $item = new Todo($inputs);
            $item->save();
            return response()->json($this->index(), 201);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @return TodoResource
     * @throws \Exception
     */
    public function show(Todo $todo): TodoResource
    {
        try {
            return new TodoResource($todo);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTodoRequest $request
     * @param Todo $todo
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        try {
            $inputs = $request->all();
            Log::info($todo->id, [$inputs]);
            $item = $todo->fill($inputs);
            $item->save();
            return response()->json($this->index());
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Todo $todo): JsonResponse
    {
        try {
            $todo->delete();
            return response()->json($this->index(), 204);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
