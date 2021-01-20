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
	    border: 1px solid #099619;
	    background-color: #099619;
	    outline: none;
	}

	#add_product_button:hover {
		background-color: white;
		cursor: pointer;
		color: #099619;
	}

</style>

@include('layouts.loggedInNavbar')

<div id="add_products_container" class="col-12">
	<div id="add_products_form" class="col-4 offset-4">
		<form action="{{ route('admin.depo_add') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="text" name="bar_kodi" placeholder="Bar Kodi" class="input">
			<input type="text" name="emri" placeholder="Emri" class="input">
			<input type="text" name="sasia" placeholder="Sasia" class="input">
			<input type="text" name="cmimi_blerjes" placeholder="Cmimi i blerjes" class="input">
			<input type="text" name="cmimi_shitjes" placeholder="Cmimi i shitjes" class="input">
			<button id="add_product_button">SHTO</button>
		</form>
	</div>
</div>
@endsection