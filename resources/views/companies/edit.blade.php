@extends('layouts/detail')

@section('title')
Wijzig profiel
@endsection

@section('link')
/companies/profile/{{$company->id }}
@endsection

@section('content')

<div class="editpart">
    <br>
    <h2>Wijzig uw logo</h2>
    <br>

    <div class="panel panel-primary">


        <div class="profielfoto">

            @if($company->profile_picture!=null)
            <img src="{{asset('../profileImages').'/'.$company->logo}}" alt="profile picture" class="profilepic">
            @endif

            @if($company->profile_picture==null)
            <img src="{{asset('../img/defaultProfile.png')}}" alt="profile picture" class="profilepic">
            @endif
        </div>
    
        Upload hier je logo
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>

        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Oei!</strong> Er is iets misgelopen!
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif





        <form action="/companies/imageUpload/{company}" method="POST" enctype="multipart/form-data">
            {{method_field('put')}}
            @csrf
            <input type="file" name="image" class="form-control">
            <br>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>

        <br><br><br><br><br>

        <!-- persoonlijke gegevens --->
        <form action="/companies/update/{{$company->id}}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}

            @if( $errors->any() )
            @component('components/alert')
            @slot('type','danger')
            Niet alle velden zijn ingevuld
            <ul>
                @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
                @endforeach
            </ul>
            @endcomponent
            @endif

            <br>
            <h2>Bedrijfsgegevens</h2>
            <br>
            <br>

            <label for="firstname">Bedrijfsnaam</label>
            <input type="text" class="form-control" name="companyname" id="firstname" value="{{$company->name}}">
             <br>
            <label for="email">E-mailadres</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$company->email}}">
            <br>
            <label for="password">Wachtwoord *</label>
            <input type="password" class="form-control" name="password" id="password" value="">
            <p class="required">* verplichte velden</p>
            
                
              

        

            <br>
            <button type="submit" class="btn btn-success">Opslaan</button>
            <br>
            <br>
            <br>
            <br>

        </form>
    </div>


    @endsection