@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center col-md-12">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">TO-DO-LISTS / SHARE</div>
                <div class="card-body">
                  <form method="POST" action="{{ action('TodoController@postshare',[$to_do_list->id]) }}">
                      @csrf
                      @method('PUT')
                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                          <div class="col-md-6">
                            <select name="user" class="form-control"  id="user">
                              <option value="">Select user for share</option>
                              @foreach($userLists as $userList)
                                <option value="{{$userList->id}}">{{ucwords($userList->name)}}</option>
                              @endforeach
                            </select>
                              @error('user')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-success">
                                  {{ __('Share') }}
                              </button>


                          </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
