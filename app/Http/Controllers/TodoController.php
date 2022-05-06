<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    
    public function index(){

        $todo = Todo::all();
        return view('home')->with('todos', $todo);
    
    }
    public function create(){
        return view('create');
    }
    public function details(){
    
        return view('details');
    
    }
    
    public function edit(){
    
        return view('edit');
    
    }
    public function update(){
    
        //we will write codes for updating a todo here
    
    }
    public function delete(){
    
        //we will write codes for deleting a todo here
    
    }

    public function store_todo_task(Request $request) 
    {
        $this->validate($request,
        [
            'taskname' => 'required',
            'tasksummary' => 'required'
        ]);

        $todo = new Todo();
        //On the left is the field name in DB and on the right is field name in Form/view
        $todo->taskname = $request->taskname;
        $todo->tasksummary = $request->tasksummary;
        $todo->save();

        session()->flash('success', 'Todo created succesfully');

        return redirect('/');
    }

    
}
