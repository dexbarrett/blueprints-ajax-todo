<?php
class TodoController extends BaseController
{

    public function getIndex()
    {
        $todos = Todo::all();
        
        return View::make('index')
            ->with('todos', $todos);    
    }

    public function postAdd()
    {
        if (Request::ajax()) {
            $todo = new Todo;
            $todo->title = Input::get('title');
            $todo->save();

            return View::make('ajaxData')
                ->with('todo', $todo); 
        }
           
    }

    public function postUpdate($id)
    {
        if (Request::ajax()) {

            $task = Todo::find($id);
            $task->title = Input::get('title');
            $task->save();

            return 'OK';
        }

    }

    public function getDelete($id)
    {
        if (Request::ajax()) {
            $todo = Todo::whereId($id)->first();
            $todo->delete();
            return 'OK';
        }
    }

    public function getDone($id)
    {
        if (Request::ajax()) {
            $task = Todo::find($id);
            $task->status = ((int)$task->status == 1 )? 0: 1;
            $task->save();
            return 'OK';    
        }    
    }
}