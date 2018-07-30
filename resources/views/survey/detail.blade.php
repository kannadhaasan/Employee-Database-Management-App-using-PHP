@extends('layout')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> {{ $survey->title }}</span>
      <p>
        {{ $survey->description }}
      </p>
      <br/>
      <a href='view/{{$survey->id}}'>Take Survey</a> @if(Auth::user()->role_id != 2)| <a href="{{$survey->id}}/edit">Edit Survey</a> | <a href="/survey/answers/{{$survey->id}}">View Answers</a> @endif
      @if(Auth::user()->role_id != 2)
      <a href="#doDelete" style="float:right;" class="modal-trigger red-text">Delete Survey</a>
      <!-- Modal Structure -->
      <!-- TODO Fix the Delete aspect -->
      <div id="doDelete" class="modal bottom-sheet">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <h4>Are you sure?</h4>
              <p>Do you wish to delete this survey called "{{ $survey->title }}"?</p>
              <div class="modal-footer">
                <a href="/survey/{{ $survey->id }}/delete" class=" modal-action waves-effect waves-light btn-flat red-text">Yep yep!</a>
                <a class=" modal-action modal-close waves-effect waves-light green white-text btn">No, stop!</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="divider" style="margin:20px 0px;"></div>
      <p class="flow-text center-align">Questions</p>
      <ul class="collapsible" data-collapsible="expandable">
          @forelse ($survey->questions as $question)
          <li style="box-shadow:none;">
            <div class="collapsible-header">{{ $question->title }} 
              @if(Auth::user()->role_id !=2)
              <a href="/question/{{ $question->id }}/edit" style="float:right;">Edit</a></div>
              @endif
            <div class="collapsible-body">
              <div style="margin:5px; padding:10px;">
                  {!! Form::open() !!}
                    @if($question->question_type === 'text')
                      {{ Form::text('title')}}
                    @elseif($question->question_type === 'number')
                      {{ Form::text('title')}}
                    @elseif($question->question_type === 'date')
                      {{ Form::text('title')}}
                    @elseif($question->question_type === 'textarea')
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label for="textarea1">Provide answer</label>
                      </div>
                    </div>
                    @elseif($question->question_type === 'radio')
                      @foreach($question->option_name as $key=>$value)
                        <p style="margin:0px; padding:0px;">
                          <input type="radio" id="{{ $key }}" />
                          <label for="{{ $key }}">{{ $value }}</label>
                        </p>
                      @endforeach
                    @elseif($question->question_type === 'select')
                      @foreach($question->option_name as $key=>$value)
                        <p style="margin:0px; padding:0px;">
                          <input type="select" id="{{ $key }}" />
                          <label for="{{ $key }}">{{ $value }}</label>
                        </p>
                      @endforeach
                    @elseif($question->question_type === 'checkbox')
                      @foreach($question->option_name as $key=>$value)
                      <p style="margin:0px; padding:0px;">
                        <input type="checkbox" id="{{ $key }}" />
                        <label for="{{$key}}">{{ $value }}</label>
                      </p>
                      @endforeach
                    @endif 
                  {!! Form::close() !!}
              </div>
            </div>
          </li>
          @empty
            <span style="padding:10px;">Nothing to show. Add questions below.</span>
          @endforelse
      </ul>
      <h2 class="flow-text">Add Question</h2>
      <form method="POST" action="{{ $survey->id }}/questions" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="input-field col s12">
            <select class="browser-default" name="question_type" id="question_type">
              <option value="" disabled selected>Choose your option</option>
              <option value="text">Text</option>
              <option value="number">Number</option>
              <option value="date">Date</option>
              <option value="textarea">Textarea</option>
              <option value="checkbox">Checkbox</option>
              <option value="select">Select</option>
              <option value="radio">Radio Buttons</option>
            </select>
          </div>                
          <div class="input-field col s12">
            <input name="title" id="title" type="text">
            <label for="title">Question</label>
          </div>  
          <!-- this part will be chewed by script in init.js -->
          <span class="form-g"></span>

          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Submit</button>
          </div>
        </div>
        </form>
        @endif
    </div>
  </div>
@stop
