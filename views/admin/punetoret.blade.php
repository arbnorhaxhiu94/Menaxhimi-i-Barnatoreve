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
		border-bottom: 5px solid #099619;
	}

	#shopping_cart_container table td {
		font-size: 18px;
		padding: 0.6em 0em;
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
		<h1>A-PHARM - Punëtorët</h1>
		<hr style="border: 0.5px solid gray; width: 100%;">
		<div class="departments_container">
			@if(session('add_success'))
			<div class="alert alert-success" style="width: 100%;">Punëtori/ja u shtua me sukses.</div>
			@endif
            <form method="GET" action="{{ route('admin.punetor_shto') }}" >
                <button style="width: 100%;">SHTO NJE PUNETOR TE RI</button>
            </form>
            
			<table class="table table-striped">
                <tr>
                    <td colspan="4"><h3>PUNETORET</h3></td>
                </tr>
				<tr>
					<td><p style="font-weight: bold; font-size: 24px;">Emri Mbiemri</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Pozita e punës</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Paga mujore</p></td>
				</tr>
            @if(!empty($punetoret))
				@foreach($punetoret as $punetor)
				<tr>
					<td>{{ $punetor['emri'] }}</td>
					<td>{{ $punetor['pozita'] }}</td>
					<td>{{ $punetor['paga'] }}</td>
					<td>
						<form method="GET" action="{{ route('admin.ndrysho_punetor', $punetor->id) }}">
							<button>Ndrysho</button>
						</form>
					</td>
				</tr>
				@endforeach
                <tr>
                    <td><p style="font-weight: bold; font-size: 24px;">Totali i punetoreve:</p></td>
                    <td><p style="font-weight: bold; font-size: 24px;">{{ $totali_punetoret }}</p></td>
                    <td><p style="font-weight: bold; font-size: 24px;">Totali i pagave:</p> </td>
					<td><p style="font-weight: bold; font-size: 24px;">{{ $totali_paga }}</p></td>
                </tr>
            @endif
			</table> 
	</div>
</div>

@endsection
