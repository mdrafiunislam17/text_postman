<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    /**
     * Index
     */
    public function index(): View
    {
        //

//        return Todo::all();

//        return TodoResource::collection(Todo::all());

//        return new TodoCollection(Todo::all());

        $todos = Todo::all();
        return view('admin.todo.index', compact('todos'));
    }

    /**
     * Create
     */
    public function create(): View
    {
        //
        return view('admin.todo.create');
    }

    /**
     * Store
     */
    public function store(Request $request): RedirectResponse
    {
        //

        $request->validate([
            "description" => "required",
        ]);


        try {
            $todo = new Todo();
            $todo->fill([
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

        $todo->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('todo.index')->with("success", "Todo has been inserted successfully.");
    }

    /**
     * Show
     */
    public function show(Todo $todo)
    {
        //

//        return new TodoResource($todo);
        return view('admin.todo.show', compact('todo'));
    }

    /**
     * Edit
     */
    public function edit(Todo $todo)
    {
        //
//        return new TodoResource($todo);

        return view('admin.todo.edit', compact('todo'));
    }

    /**
     * Update
     */
    public function update(Request $request, Todo $todo): RedirectResponse
    {
        try {
            $todo->fill([
                "description" => $request->input("description"),
                "status" => $request->input("status"),
            ]);

            $todo->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route('todo.index')->with("success", "Todo has been updated successfully.");
    }

//public function update (Request $request, string $id): RedirectResponse
//{
//    $todo = Todo::find($id);
//    if (!$todo) {
//        return redirect()
//            ->back()
//            ->withInput()
//            ->with("error", "Todo not found.");
//    }
//
//    try {
//        $todo->fill([
//            "description" => $request->input("description"),
//            "status" => $request->input("status"),
//        ]);
//
//        $todo->save();
//    } catch (QueryException $exception) {
//        return redirect()
//            ->back()
//            ->withInput()
//            ->with("error", "QueryException code: " . $exception->getCode());
//    }
//
//    return redirect()->back()->with("success", "Todo has been updated successfully.");
//}
    /**
     * Destroy
     */
    public function destroy(Todo $todo): RedirectResponse
    {
        $todo->delete();

        return redirect()->back()->with("success", "Todo has been deleted successfully.");
    }
}
