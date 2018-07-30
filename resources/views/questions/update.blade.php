@extends('layout')

@section('content')
<form method="POST" action="/questions/{{ $question->id }}">
  {{ method_field('PATCH') }}
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <h2 class="flow-text">Edit Item</h2>
   <div class="row">
    <div class="input-field col s12">
      <textarea id="textarea1" name="body" class="materialize-textarea">{{ $question->body }}</textarea>
      <label for="textarea1">Textarea</label>
    </div>
    <div class="input-field col s12">
    <button class="btn waves-effect waves-light">Update</button>
    </div>
  </div>
</form>
@stop