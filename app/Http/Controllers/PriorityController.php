<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priority;
use Illuminate\Support\Facades\Validator;

class PriorityController extends Controller
{
    public function index()
    {
        return Priority::all();
    }

    public function show($id)
    {
        return Priority::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level' => 'required|in:low,medium,high',
            'description' => 'required|string|max:250',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $priority = Priority::create($request->all());
        return response()->json($priority, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'level' => 'sometimes|required|in:low,medium,high',
            'description' => 'sometimes|required|string|max:250',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $priority = Priority::findOrFail($id);
        $priority->update($request->all());
        return response()->json($priority, 200);
    }

    public function destroy($id)
    {
        Priority::destroy($id);
        return response()->json(null, 204);
    }
}
