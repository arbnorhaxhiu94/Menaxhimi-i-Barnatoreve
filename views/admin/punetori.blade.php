@extends('layouts.main')
@section('content')

<style type="text/css">

	#add_products_container {
		text-align: center;
	}

	#add_products_form {
		margin-top: 10%;
	}

	.input {
		width: 100%;
		margin: 5px;
		padding: 10px 5px;
		border: 1px solid gray;
		border-radius: 5px;
	}

	select {
		cursor: pointer;
	}

	.inputfile {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}

	.inputfile + label {
		margin: 5px;
		padding: 7px;
		width: 100%;
	    color: white;
	    font-size: 14px;
	    border: 1px solid #ff5000;
	    background-color: #ff5000;
	}

	.inputfile:focus + label,
	.inputfile + label:hover {
	    background-color: white;
	    color: #ff5000;
	    cursor: pointer;
	}

	#add_product_button {
		margin: 5px;
		padding: 7px;
		width: 100%;
	    color: white;
	    font-size: 14px;
	    border: 1px solid #ff8c00;
	    background-color: #ff8c00;
	    outline: none;
	}

	#add_product_button:hover {
		background-color: white;
		cursor: pointer;
		color: #ff8c00;
	}

</style>

@include('layouts.loggedInNavbar')

@if($punetor)
<div id="add_products_container" class="col-12">
	<div id="add_products_form" class="col-4 offset-4">
		<form action="{{ route('admin.punetor_ndrysho', $punetor->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="text" name="emri" placeholder="Emri" class="input" value="{{ $punetor->emri }}">
			<input type="text" name="pozita" placeholder="Pozita" class="input" value="{{ $punetor->pozita }}">
			<input type="text" name="paga" placeholder="Paga" class="input" value="{{ $punetor->paga }}">
			<select name="aktiv" class="input" id="gender" value="{{ $punetor->aktiv }}">
				<option value="0">Joaktiv</option>
				<option selected value="1">Aktiv</option>
			</select>
            <select name="b_id" class="input" id="gender" value="{{ $punetor->b_id }}">
                @foreach($barnatoret as $barnatore)
                @if($barnatore->id == $punetor->b_id)
                <option selected value="{{ $barnatore->id }}">{{ $barnatore->emri }}</option>
                @else
				<option value="{{ $barnatore->id }}">{{ $barnatore->emri }}</option>
                @endif
				@endforeach
			</select>
			<button id="add_product_button">NDRYSHO</button>
		</form>
	</div>
</div>
@else
<div>
	<h1>An error occurred</h1>
</div>
@endif
@endsection