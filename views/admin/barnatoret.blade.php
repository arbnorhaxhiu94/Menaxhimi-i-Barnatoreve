@extends('layouts.main')
@section('content')

<style type="text/css">
	#dashboard_container{
		display: inline-flex;
	}
	#shopping_cart_container {
		margin: 5% 5%;
		padding: 20px;
		display: block;
		width: 100%;
	}
	#shopping_cart_container table {
		width: 100%;
		text-align: center;
	}

	#shopping_cart_container table td {
		font-size: 18px;
		padding: 2em 0em;
	}

	#shopping_cart_container table .first_col {
		border-right: 1px solid gray;
		width: 50%;
	}

	#shopping_cart_container button {
		margin: 5px;
		padding: 7px;
		width: 70%;
	    color: white;
	    font-size: 14px;
	    border: 1px solid #099619;
	    background-color: #099619;
	}

	#shopping_cart_container button:hover {
		background-color: white;
		color: #099619;
	}

	@media only screen and (max-width: 1000px) {
		#product_container {
			width: 100%;
		}
	}

</style>

@include('layouts.loggedInNavbar')

<div class="col-12" id="dashboard_container">
	<div id="shopping_cart_container">
		<h1>BARNATORET</h1>
		<hr style="border: 0.5px solid gray; width: 100%;">
		<div class="departments_container">
			<table class="table table-striped">
				<tr>
					<td><p style="font-weight: bold; font-size: 24px;">Emri</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Lokacioni</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Detajet</p></td>
				</tr>
			@if(!empty($barnatoret))
				@foreach($barnatoret as $barnatore)
				@if($barnatore->id != 6)
				<tr>
					<td>{{ $barnatore['emri'] }}</td>
					<td>{{ $barnatore['lokacioni'] }}</td>
					<td>
						<form method="GET" action="{{ route('admin.barnatorja_detajet', $barnatore->id) }}">
							<button>DETAJET</button>
						</form>
					</td>
				</tr>
				@endif
				@endforeach
			@endif
			</table> 
		</div>
		
	</div>
</div>

@endsection
