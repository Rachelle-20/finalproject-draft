<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function show($id)
    {
        return Note::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'required|exists:tasks,task_id',
            'user_id' => 'required|exists:users,user_id',
            'note_content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $note = Note::create($request->all());
        return response()->json($note, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'note_content' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $note = Note::findOrFail($id);
        $note->update($request->all());
        return response()->json($note, 200);
    }

    public function destroy($id)
    {
        Note::destroy($id);
        return response()->json(null, 204);
    }
}
