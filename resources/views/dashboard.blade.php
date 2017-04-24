<!-- Extending the Meta data master view -->
@extends('layouts.master')

<!-- Adding the content to the master view -->
@section('content')
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">Welcome, {{Session::get('name')}}</div>
    <div class="panel-body">

      <!-- Displaying info that a new post has been added or deleted -->
      @if(Session::has('info'))
        <div class="row">
          <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
          </div>
        </div>
      @endif

      <!-- Links for new post and Logout -->
      <a class="btn btn-success" href = {{ route('addNewNote') }}>Add New Note</a>
      <a class="btn btn-danger" href = {{route('logout')}}>Logout</a>

      <!-- Iterating and displaying all the posts for that users -->
      <div class="well">
      @foreach($notes as $note)
        <div class="col-sm-12 note-container">
          <div class="col-sm-8">
            <!-- Formating the create_at date using Carbon facade -->
            <p class="note-title"> {{$note->title}} (Created by {{Session::get('name')}} User, {{$note->created_at->setTimezone('-05:00')->format('D H:i')}} )</p>
          </div>
          <div class="col-sm-2 pull-right">
            <form method="post">
              <input type="hidden" name="id" value="{{ $note->id }}">
              <input type="submit" class="btn btn-primary" value="Edit" name="edit" formaction="{{ route('editNote') }}">
              <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure want to delete?');" name="delete" formaction="{{ route('deleteNote') }}">
            </form>
          </div>
          <div class="col-sm-12">
            <p class="title-description">{{$note->description}}</p>
          </div>
      </div>
      @endforeach

      <!-- Laravel Pagination -->
      <div class="row">
        <div class="col-sm-12 text-center">
          {!! $notes->render() !!}
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
