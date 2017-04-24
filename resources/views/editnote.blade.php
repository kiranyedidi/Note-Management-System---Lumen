@extends('layouts.master')

<!-- View to display the note to update -->
@section('content')
    @include('partials.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">Add Note</div>
        <div class="panel-body">
          <div class="row">
              <div class="col-md-12">
                  <form action="{{ route('postEditedNote') }}" method="post">
                      <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="title" value="{{ $note->title }}" name="title">
                      </div>
                      <div class="form-group">
                          <label for="content">Description</label>
                          <input type="text" class="form-control" id="description" value="{{ $note->description }}" name="description">
                      </div>
                      <input type="hidden" name="id" value="{{ $note->id }}">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button class="btn btn-danger" onclick="event.preventDefault(); window.location.href='{{ route('fetchNotes') }}'">Cancel</button>
                  </form>
              </div>
          </div>
        </div>
      </div>
@endsection
