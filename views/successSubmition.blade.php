@extends('layouts.main')
@include('layouts.navbar')
@section('content')

<style type="text/css">
	#successPage {
		margin-top: 10em;

	}

	#message {
		text-align: center;
		font-size: 2em;
		width: 70%;
		margin: 10px 15%;
	}

	#submit_button{
        padding: 10px 5px;
        background-color: #099619;
        border: 1px solid #099619;
        font-size: 14px;
        color: white;
        letter-spacing: 1px;
        width: 70%;
		margin: 10px 15%;
    }

    #submit_button:hover {
        background-color: white;
        color: #099619;
    }

</style>

<div id="successPage">
@if(session('message'))
    <div id="message" class="alert alert-success" role="alert">{{ session('message') }}</div>
@endif
<a href="{{ route('main-page') }}"><button id="submit_button" type="submit">GO BACK</button></a>
</div>


@endsection