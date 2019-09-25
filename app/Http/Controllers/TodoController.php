<?php

namespace App\Http\Controllers;

use App\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
      $this->middleware('auth');
     }
    public function index()
    {

        $todoLists = TodoList::where('isDelete',0)->where('user_id',Auth::id())->orWhere('shared_id',Auth::id())->orderBy('created_at','desc')->get();


        return view('todolist.index',['todoLists'=>$todoLists,'count'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      request()->validate([
          'title'=>['required','string'],
      ]);
      TodoList::create([
        'title'=>$request->title,
        'user_id'=>Auth::id(),
        'isDelete'=>false,
        'status'=>false,
      ]);
      successFlash('Successfully cretaed the todo lists');
        return redirect("to-do-list");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function show(TodoList $todoList)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function edit(TodoList $to_do_list)
    {
        return view('todolist.edit',["to_do_list"=>$to_do_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoList $to_do_list)
    {
      request()->validate([
          'title'=>['required','string'],
      ]);

      $to_do_list->update(['title'=>$request->title,]);
      successFlash('Successfully updated the todo lists');
        return redirect("to-do-list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $to_do_list)
    {


        $to_do_list->update(['isDelete'=>1]);
        successFlash('Successfully deleted the todo lists');
          return redirect("to-do-list");
    }

    public function complete(Request $request, TodoList $to_do_list){

      $to_do_list->update(['status'=>1]);
      successFlash('Successfully completed the todo lists');
        return redirect("to-do-list");
    }

    public function share(TodoList $to_do_list){
      $userLists = User::where('id','<>',Auth::id())->orderBy('name')->get();
      return view('todolist.share',["userLists"=>$userLists,"to_do_list"=>$to_do_list]);
    }
    public function postshare(Request $request, TodoList $to_do_list){
      request()->validate([
          'user'=>['required'],
      ]);

      $to_do_list->update(['shared_id'=>$request->user,]);
      successFlash('Successfully shared the todo lists');
        return redirect("to-do-list");
    }
}
