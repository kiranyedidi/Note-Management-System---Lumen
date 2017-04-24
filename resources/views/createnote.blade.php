@extends('layouts.master')

@section('content')
    @include('partials.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">Add Note</div>
        <div class="panel-body">
          <div class="row">
              <div class="col-md-12">
                  <form action="{{ route('postNewNote') }}" method="post">
                      <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="title" name="title">
                      </div>
                      <div class="form-group">
                          <label for="content">Description</label>
                          <input type="text" class="form-control" id="description" name="description">
                      </div>
                      <input type="hidden" name="id" value="{{ Session::get('id') }}">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button class="btn btn-danger" onclick="event.preventDefault(); window.location.href='{{ route('fetchNotes') }}'">Cancel</button>
                  </form>
              </div>
          </div>
        </div>
      </div>
@endsection
