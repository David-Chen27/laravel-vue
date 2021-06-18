<?php

namespace App\Http\Controllers;

use App\Models\r;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('TodoList/Index', [
            'Todos' => TodoList::where('user_id', $request->user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'is_done' => "boolean",
            'description' => "required|string|max:255"
        ]);

        $request->merge(['user_id' => $request->user()->id]);

        TodoList::create($request->all());

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $query = TodoList::where(['user_id' => $request->user()->id, 'id' => $id]);

        ($query->count() <= 0) ?: $query->update(['is_done' => $request->is_done]);

        return back(303);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $query = TodoList::where(['user_id' => $request->user()->id, 'id' => $id]);

        ($query->count() <= 0) ?: $query->delete();

        return back(303);
    }
}
