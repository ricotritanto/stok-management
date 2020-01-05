<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Test;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $tasks = test::orderBy('id', 'desc')->paginate(2);
        // print_r($task);exit();
        return view('test.index')->with('tasks',$tasks);
    }

     public function store(Request $request)
    {
        $validator = Validator::make($request->input(), array(
            'task' => 'required',
            'description' => 'required',
        ));
        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $task = test::create($request->all());

        return response()->json([
            'error' => false,
            'task'  => $task,
        ], 200);
    }

    public function show($id)
    {
        $task = test::find($id);

        return response()->json([
            'error' => false,
            'task'  => $task,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->input(), array(
            'task' => 'required',
            'description' => 'required',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $task = test::find($id);

        $task->task        =  $request->input('task');
        $task->description = $request->input('description');

        $task->save();

        return response()->json([
            'error' => false,
            'task'  => $task,
        ], 200);
    }

    public function destroy($id)
    {
        $task = test::destroy($id);

        return response()->json([
            'error' => false,
            'task'  => $task,
        ], 200);
    }
}
