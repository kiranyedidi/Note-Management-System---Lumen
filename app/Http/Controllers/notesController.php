<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\User;

class notesController extends Controller
{
    // function to fetch all notes of the user
    public function fetchNotes(Request $request){
        // Fetching the data using "hasMany" relations defined between the models
        $notes = User::find($request->session()->get('id'))->notes()->orderBy('updated_at', 'desc')->paginate(3);
        return view('dashboard', ['notes'=>$notes]);
    }

    // Function to get the create note view
    public function addNewNote(){
      return view('createnote');
    }

    // Function to post the note to the database
    public function postNewNote(Request $request){
      // validation for the fields as required
      $this->validate($request, [
        'title' => 'required',
        'description' => 'required'
      ]);

      $note = new Note();
      $note->title = $request->input('title');
      $note->description = $request->input('description');
      $user = User::find($request->input('id'));
      $user->notes()->save($note);

      return redirect()->route('fetchNotes')->with('info', 'New note added, Title is: ' . $request->input('title'));
    }

    // Function to get the edit note view
    public function editNote(Request $request){
      $note = Note::find($request->input('id'));
      return view('editnote',['note' => $note]);
    }

    // Function to update the edited notes
    public function udpateNote(Request $request){
      $note = Note::find($request->input('id'));
      $note->title = $request->input('title');
      $note->description = $request->input('description');
      $note->save();
      return redirect()->route('fetchNotes')->with('info', 'Note updated, Title is: ' . $request->input('title'));
    }

    // Function to delete the note
    public function deleteNote(Request $request){
      $note = Note::find($request->input('id'))->delete();
      return redirect()->route('fetchNotes');
    }
}
