<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\TodoResource;

/**
 * @group Todos
 *
 * APIs for managing todos
 */
class TodoController extends Controller
{
    /**
     *  Get all todos
     *
     * @response array{data: TodoResource[], meta: array{permissions: bool}}
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        // Get page number and items per page from query parameters
        $perPage = $request->query('per_page', 10); // default 10
        $page    = $request->query('page', 1);      // default 1

        // Fetch paginated todos
        $todos = Todo::query()->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'success' => true,
            'message' => 'Todo list fetched successfully.',
            'data' => TodoResource::collection($todos),
            'meta' => [
                'current_page' => $todos->currentPage(),
                'per_page' => $todos->perPage(),
                'total' => $todos->total(),
                'last_page' => $todos->lastPage(),
                'permissions' => true, // your custom meta
            ],
            'links' => [
                'first' => $todos->url(1),
                'last' => $todos->url($todos->lastPage()),
                'prev' => $todos->previousPageUrl(),
                'next' => $todos->nextPageUrl(),
            ],
        ]);
    }

    /**
     *  Store a new todo
     *
     * @bodyParam title string required The title of the todo. Example: Buy groceries
     * @bodyParam description string The description of the todo. Example: Milk, eggs, bread
     *
     * @response array{data: TodoResource, meta: array{permissions: bool}}
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = Todo::query()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Todo created successfully.',
            'data' => new TodoResource($todo),
            'meta' => [
                'permissions' => true,
            ],
        ], 201);
    }

    /**
     *  Show a specific todo
     *
     * @urlParam id integer required The ID of the todo. Example: 1
     * @response array{data: TodoResource, meta: array{permissions: bool}}
     *
     * @param Todo $todo
     * @return JsonResponse
     */
    public function show(Todo $todo): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Todo fetched successfully.',
            'data' => new TodoResource($todo),
            'meta' => [
                'permissions' => true,
            ],
        ]);
    }

    /**
     *  Update a todo
     *
     * @urlParam id integer required The ID of the todo. Example: 1
     * @bodyParam title string The updated title of the todo. Example: Finish homework
     * @bodyParam description string The updated description of the todo. Example: Math and science
     *
     * @response array{data: TodoResource, meta: array{permissions: bool}}
     *
     * @param Request $request
     * @param Todo $todo
     * @return JsonResponse
     */
    public function update(Request $request, Todo $todo): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Todo updated successfully.',
            'data' => new TodoResource($todo),
            'meta' => [
                'permissions' => true,
            ],
        ]);
    }

    /**
     *  Delete a todo
     *
     * @urlParam id integer required The ID of the todo. Example: 1
     *
     * @response array{success: bool, message: string}
     *
     * @param Todo $todo
     * @return JsonResponse
     */
    public function destroy(Todo $todo): JsonResponse
    {
        $todo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Todo deleted successfully.',
        ], 200);
    }
}
