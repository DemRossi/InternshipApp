@extends('layouts/app')

@section('title')
Internships
@endsection

@section('h2')
    Internships
@endsection

@section('content')
<nav class="nav">
    <div class="nav__logo"> </div>
</nav>

@if ($flash = session('message'))
    <div class="alert alert-success">{{ $flash }}</div>
@endif
<div class="container_companies">
    <div class="companies_filters">
	<div class="companies_form">
		<h5>Filters</h5>
		<hr class="companies__line">
	</div>
        <div>
        <div class="panel-heading " >
						<h6 class="panel-title">
							<a data-toggle="collapse" href="#collapse0">
							 Place
							</a>
						</h6>
					</div>
					<div id="collapse0" class="panel-collapse collapse in" >
            <form method="post">
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
                  All regions
				  </span>
                </label>
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				   Antwerpen
				  </span>
                </label> 
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  Oost-Vlaanderen
				  </span>
                </label>  
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  West-Vlaanderen
				  </span>
                </label>  
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Limburg
				  </span>
                </label> 

                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Vlaams-Brabant
				  </span>
                </label> 
      
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Brussel
				  </span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  Waals-Brabant
				  </span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Luik
				  </span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Henegouwen
				  </span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Namen
				  </span>
                </label>
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				Luxemburg
				  </span>
                </label>

                </div>
                <div class="panel-heading " >
						<h6 class="panel-title">
							<a data-toggle="collapse" href="#collapse1">
							Discipline
							</a>
						</h6>
					</div>
					<div id="collapse1" class="panel-collapse collapse in" >
  
  
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    All
				  </span>
                </label>
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				   graphic designer
				  </span>
                </label> 
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  ui/ux designer
				  </span>
                </label>  
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  front-end developer
				  </span>
                </label>  

                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  back-end developer
				  </span>
                </label>  
                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
                
                
                
                
                
           
			</form>
        </div>
        
</div>
<div class="companies">
    @if (\Auth::user()->type == 'student')
        @foreach($internships as $internship)
            <div class="companies__detail" >
                <a href ="/internships/{{ $internship->id }}">{{ $internship->internship_function }}</a>
                <p>{{ $internship->internship_discription }}</p>
                <hr class="companies__line">
                <p>{{ $internship->available_spots }} available</p>
                @if ($internship->jobApplications->count() == 0)
                    <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary">Apply</a>
                @else
                    @foreach($internship->jobApplications as $jobApplication)
                        @if ($internship->available_spots != 0 && $jobApplication->user_id != \Auth::user()->id)
                            <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary">Apply</a>
                        @endif
                        @if ($jobApplication->user_id == \Auth::user()->id)
                            <div class="alert alert-primary" role="alert">
                                You already applied for this internship.
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
@else
    @foreach ($internships as $internship)
        {{--@foreach($internship->jobApplications as $jobApplication)
        @endforeach--}}
        <div class="companies__detail" >
            <a href ="/internships/{{ $internship->id }}">{{ $internship->internship_function }}</a>
            <p>{{ $internship->internship_discription }}</p>
            <hr class="companies__line">
            <p>{{ $internship->available_spots }} available</p>
        </div>
    @endforeach
@endif

@endsection