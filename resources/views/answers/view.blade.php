@extends('layout')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title">View Answers for</span>
      <p>
        Survey theme: {{ $survey->title }} <br/>
        About Survey: {{ $survey->description }}
      </p>

      <div class="divider" style="margin:20px 0px;"></div>
          @forelse ($survey->answers as $answer)
          {{ $answer->answer }}
          @empty
            <span class='flow-text center-align'>Nothing to show</span>
          @endforelse
    </div>
  </div>
@stop