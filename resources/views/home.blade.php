@extends('layout')

@section('content')
<ul class="collection with-header">
    <li class="collection-header">
        <h2 class="flow-text">Surveys
            @if(Auth::user()->role_id != 2)
             <span style="float:right;">{{ link_to_route('new.survey', 'Create new') }}
            </span> 
            @endif
        </h2>
    </li>

    @forelse ($surveys as $survey)
      <li class="collection-item">
        <div>
            {{ link_to_route('detail.survey', $survey->title, ['id'=>$survey->id])}}
            @if(Auth::user()->role_id != 2)
            <a href="survey/{{ $survey->id }}" title="Edit Survey" class="secondary-content"><i class="material-icons">edit</i></a>
            <a href="survey/answers/{{ $survey->id }}" title="View Survey Answers" class="secondary-content"><i class="material-icons">textsms</i></a> 
            @endif
            <a href="survey/view/{{ $survey->id }}" title="Take Survey" class="secondary-content"><i class="material-icons">send</i></a>
            @if(Auth::user()->role_id != 2)
            <a href="#" title="User Responses" class="secondary-content"> {{ $survey->answers->count() }} Responses &nbsp; </a>
            @endif
        </div>
        </li>
    @empty
        <p class="flow-text center-align">Nothing to show</p>
    @endforelse
    </ul>
<!--     @if(Auth::user())
    @forelse ($surveys as $survey)
  <li class="collection-item">
    <div><a href="survey/{{ $survey->id }}">{{ $survey->title}}</a>
        <a href="survey/view/{{ $survey->id }}" title="Take Survey" class="secondary-content"><i class="material-icons">send</i></a>
        <a href="survey/{{ $survey->id }}" title="Edit Survey" class="secondary-content"><i class="material-icons">edit</i></a>
        <a href="survey/answers/{{ $survey->id }}" title="View Survey Answers" class="secondary-content"><i class="material-icons">textsms</i></a>
    </div>
    </li>
@empty
    <p class="flow-text center-align">Nothing to show</p>
@endforelse
</ul>
    @endif -->


@stop