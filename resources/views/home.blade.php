@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('h2')
Ready for the next step?
@endsection



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($flash = session('message'))
<div class="alert alert-sucess">{{$flash}}</div>
@endif
                </div>
            </div>
        </div>
    </div>
    <a class="dropdown-item" href="{{ route('logout') }}"	
                                       onclick="event.preventDefault();	
                                                     document.getElementById('logout-form').submit();">	
                                        {{ __('Logout') }}	
                                    </a>	

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">	
                                        @csrf	
                                    </form>
</div>
@endsection
