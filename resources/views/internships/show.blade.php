@extends('layouts/detail')

@section('title')
{{$internship->company->name}}
@endsection

@if (\Auth::user()->type == 'student')
@section('link')
{{ url('/internships') }}
@endsection
@elseif (\Auth::user()->type == 'company')
@section('link')
{{ url('/internships/myinternships') }}
@endsection
@endif

@section('content')
<div class="internship-show container">
    <section class="internship-show_info">
        @if (\Auth::user()->type == 'student')
        <h1 class="company-name">{{ $internship->internship_function }} bij <a href="/companies/{{$internship->company->id}}">{{$internship->company->name}}</a></h1>
        <section class="internship-show_apply clearfix">
            @if($internship->available_spots > 0)
            @if(!$jobApplications->isEmpty())
            <div class="alert alert-primary" role="alert">
                U heeft al gesolliciteerd voor deze stageplaats.
            </div>
            <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary disabled"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Solliciteer nu</a>
            @else
            <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Solliciteer nu</a>
            @endif
            @else
            <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary disabled"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Solliciteer nu</a>
            <div class="alert alert-primary" role="alert">
                Er zijn geen vrije plekken meer.
            </div>
            @endif

            @if(!$like == null)
            @if($like->status == 1)
            <form action="" method="POST">
                {{csrf_field()}}
                <button class="btn btn-secondary disabled orange" name="save" value="save" type="submit">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    Bewaart</button>
            </form>
            @else
            <form action="" method="POST">
                {{csrf_field()}}
                <button class="btn btn-secondary orange" name="save" value="save" type="submit">
                    <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                    Bewaar in favorieten</button>
            </form>
            @endif
            @else
            <form action="" method="POST">
                {{csrf_field()}}
                <button class="btn btn-secondary orange" name="save" value="save" type="submit">
                    <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                    Bewaar in favorieten</button>
            </form>
            @endif
        </section>
        @elseif (\Auth::user()->type == 'company')
        <h1>{{ $internship->internship_function }}</h1>
        <section class="internship-show_apply">
            <a href="/internships/{{$internship->id }}/editMyInternship" class="btn btn-secondary">Pas aan</a>
            <form action="" method="POST">
                {{method_field('put')}}
                {{csrf_field()}}
                <button class="btn btn-secondary orange" name="delete" value="delete" type="submit">Verwijder</button>
            </form>
        </section>
        @endif
        <h3>Beschrijving</h3>
        <p>{{ $internship->internship_discription }}</p>
        <p>{{ $internship->company->city }}</p>
        <h3>Profiel</h3>
        <p>{{ $internship->internship_profile}}</p>
        <h3>Specificaties</h3>
        <ul>
            <li>Onderwijs niveau: {{ $internship->education_level}} </li>
            <li>Talen: {{ $internship->languages}} </li>
            <li>Rijbewijs: @if($internship->drivers_license === 1) ja @else neen @endif</li>
            <li>Betaald: @if($internship->paid === 1) ja @else neen @endif</li>
            <li>Beschikbaarheden: {{ $internship->available_spots }}</li>
        </ul>

        <h3>Opmerkingen</h3>
        @if(!$internship->remarks == '')
        <p>{{$internship->remarks}}</p>
        @else
        <p>Geen opmerkingen</p>
        @endif

        <h3>Zoektermen</h3>
        <ul class="tag-list">
            @foreach($tags as $tag)
            @if( $tag != '')
            <li class="tag-item">{{$tag}}</li>
            @else
            <li class="tag-item">Geen zoektermen gevonden voor deze stageplek.</li>
            @endif
            @endforeach
        </ul>

    </section>



    @endsection