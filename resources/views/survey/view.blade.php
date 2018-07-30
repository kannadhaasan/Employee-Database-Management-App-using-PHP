@extends('layout')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> Start taking Survey</span>
      <p>
        <span class="flow-text">{{ $survey->title }}</span> <br/>
      </p>
      <p>  
        {{ $survey->description }}
        <br/>Created by: <a href="">{{ $survey->user->name }}</a>
      </p>
      <div class="divider" style="margin:20px 0px;"></div>
          {!! Form::open(array('action'=>array('AnswerController@store', $survey->id))) !!}
          @forelse ($survey->questions as $key=>$question)
            <p class="flow-text">Question {{ $key+1 }} - {{ $question->title }} </p>
                @if($question->question_type === 'text')
                  <div class="input-field col s12">
                    <input id="answer" type="text" name="{{ $question->id }}[answer]" class='required'>
                    <label for="answer">Answer</label>
                  </div>
                @elseif($question->question_type === 'number')
                  <div class="input-field col s12">
                    <input id="answer" type="number" min="0" name="{{ $question->id }}[answer]" class='required'>
                    <label for="answer">Answer</label>
                  </div>
                @elseif($question->question_type === 'date')
                  <div class="input-field col s12">
                    <input id="answer" type="date" min="0" name="{{ $question->id }}[answer]" class='required datepicker'>
                  </div>
                @elseif($question->question_type === 'textarea')
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea required" name="{{ $question->id }}[answer]"></textarea>
                    <label for="answer">Answer</label>
                  </div>
                @elseif($question->question_type === 'radio')
                  <div style="margin:0px; padding:0px;">
                    @foreach($question->option_name as $key=>$value)                    
                      <input name="{{ $question->id }}[answer]" type="radio" id="{{ $key }}" class="required" value="{{$value}}" />
                      <label for="{{ $key }}">{{ $value }}</label>                    
                    @endforeach
                  </div>
                @elseif($question->question_type === 'select')
                  <p style="margin:0px; padding:0px;">
                    <select name="{{ $question->id }}[answer]" class="required">
                      @foreach($question->option_name as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                      @endforeach
                    </select>
                  </p>
                @elseif($question->question_type === 'checkbox')
                  <p style="margin:0px; padding:0px;">
                    @foreach($question->option_name as $key=>$value)                  
                      <input type="checkbox" class="required" id="something{{ $key }}" name="{{ $question->id }}[answer]" value="{{$value}}" />
                      <label for="something{{$key}}">{{ $value }}</label>                  
                    @endforeach
                  </p>
                @endif 
              <div class="divider" style="margin:10px 10px;"></div>
          @empty
            <span class='flow-text center-align'>Nothing to show</span>
          @endforelse
        {{ Form::submit('Submit Survey', array('class'=>'btn waves-effect waves-light')) }}
        {!! Form::close() !!}
    </div>
  </div>
@stop

@section('scripts')
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>

  <script type="text/javascript">
    $('document').ready(function() {
      $('form').validate({
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
            // $(element).parent().next().text(error.html())
          } else {
            error.insertAfter($(element).parent());            
          }
        }
      });

      $('.datepicker').datepicker();
    })

  </script>
@stop