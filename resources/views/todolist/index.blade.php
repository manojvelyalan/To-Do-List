@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mb-4 float-right">
      <a class="btn btn-success text-white" href="{{URL::to('to-do-list/create')}}">Create TO-DO-LIST</a>
    </div>
    <div class="row justify-content-center col-md-12">
      @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
      @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">TO-DO-LISTS</div>
                <div class="card-body">
                  @if($todoLists->count() > 0)
                           <table class="table table-hover table-bordered" id="tblAction">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Title</th>
                                   <th>Status</th>
                                    <th>Shared To</th>
                                      <th>Created By</th>
                                   <th>Created Time</th>
                                   <th>Delete</th>
                                   <th>Edit</th>
                                   <th>Complete</th>
                                   <th>Share</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach($todoLists as $todoList)
                                   <tr>
                                       <td>{{++$count }}</td>
                                       <td>{{($todoList->title != "" ? $todoList->title:"-")}}</td>
                                       <td>{{($todoList->status)?"Completed":"Pending"}}</td>
                                       <td>


                                         {{($todoList->shared_id !="")?$todoList->shared->name:"-"}}

                                  
                                       </td>
                                       <td>{{($todoList->shared_id !="")?$todoList->user->name:"-"}}</td>
                                       <td>{{date('d/M/Y',strtotime($todoList->created_at))}}</td>
                                       @if($todoList->shared_id == "" || $todoList->shared_id == Auth::id())
                                       <td>
                                       {{ Form::open(array('url' => '/to-do-list/' . $todoList->id, 'class' => 'pull-right')) }}
                                       {{ Form::hidden('_method', 'DELETE') }}
                                       {{Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])}}
                                       {{ Form::close() }}
                                       </td>
                                       <td><a href = "{{ URL::to('/to-do-list/' . $todoList->id . '/edit') }}" class="btn btn-info pull-right"><i class="fa fa-pencil-square-o"></i></a></td>
                                      <td>
                                        @if(!$todoList->status)
                                        {{ Form::open(array('url' => '/to-do-list/' . $todoList->id.'/complete', 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'PUT') }}
                                        {{Form::button('<i class="fa  fa-check"></i>', ['type' =>'submit', 'class' => 'btn btn-success'])}}
                                        {{ Form::close() }}
                                        @else
                                        -
                                        @endif
                                      </td>
                                        <td><a href = "{{ URL::to('/to-do-list/' . $todoList->id . '/share') }}" class="btn btn-primary pull-right"><i class="fa fa-share-square-o"></i></a></td>
                                        @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Shared Already</td>
                                        @endif
                                   </tr>
                               @endforeach

                           </tbody>
                       </table>

                        @else
                           <div class="alert alert-danger"><p>No todolist are available.</p></div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
