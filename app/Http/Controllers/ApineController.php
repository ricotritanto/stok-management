<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Test;

class ApineController extends Controller
{
    public function index()
    {
    	return test::all();
    	
    }

    public function create(Request $request)
    {
    	$test = new test;
    	$test->task = $request->task;
    	$test->description = $request->description;
    	$test->save();

    	return "data berhasil masuk";
    }

    public function update(Request $request, $id)
    {
    	$task = $request->task;
    	$description = $request->description;

    	$test = test::find($id);
    	$test->task = $task;
    	$test->description = $description;
    	$test->save();

    	return "data berhasil diupdate";
    }

    public function delete($id)
    {
    	$test = test::find($id);
    	$test->delete();

    	return "data berhasil didelete";
    }
}
