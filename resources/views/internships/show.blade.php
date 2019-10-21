<<<<<<< HEAD
@extends('layouts/detail')

@section('title')
{{$internship->name}}
@endsection


@section('content')
<h1>{{ $internship->internship_function }}</h1>
=======
@extends('layouts/app')
>>>>>>> origin/master

@section('content')
<h1>{{ $internship->internship_function }}</h1>
<h3>Info</h3>
<h3>{{ $internship->internship_discription }}</h3>
<h4>{{ $internship->available_spots }} available</h4>
<<<<<<< HEAD

@if ($internship->available_spots != 0)
    <a href="/internships/{{ $internship->id }}/apply" class="btn-apply">Apply</a>
=======
@if ($internship->jobApplications->count() == 0)
    <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary">Apply</a>
@else
    @foreach ($internship->jobApplications as $jobApplication)
        @if ($internship->available_spots != 0)
            <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary">Apply</a>
        @endif
        @if ($jobApplication->user_id == \Auth::user()->id)
            <div class="alert alert-primary" role="alert">
                You already applied for this internship.
            </div>
        @endif
    @endforeach
>>>>>>> origin/master
@endif
@endsection