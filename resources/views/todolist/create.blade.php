@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center col-md-12">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">TO-DO-LISTS / CREATE</div>
                <div class="card-body">
                  <form method="POST" action="{{ action('TodoController@store') }}">
                      @csrf

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                          <div class="col-md-6">
                              <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="email" autofocus>

                              @error('title')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-success">
                                  {{ __('Submit') }}
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
