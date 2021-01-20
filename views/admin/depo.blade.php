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
		<h1>DEPO</h1>
		<hr style="border: 0.5px solid gray; width: 100%;">
		<div class="departments_container">
			@if(session('add_success'))
			<div class="alert alert-success" style="width: 100%;">Produkti u shtua me sukses.</div>
			@endif
			@if(session('edit_success'))
			<div class="alert alert-success" style="width: 100%;">Ndryshimi u bë me sukses.</div>
			@endif
			@if(session('transfer_success'))
			<div class="alert alert-success" style="width: 100%;">Transferimi u bë me sukses.</div>
			@endif
			<table class="table table-striped">
				<tr style="background-color: #e89200;">
                    <td colspan="4"><h1 style="color: white;">PUNETORET</h1></td>
                </tr>
				<tr>
					<td><p style="font-weight: bold; font-size: 24px;">Emri Mbiemri</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Pozita e punës</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Paga mujore</p></td>
					<td></td>
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
                    <td></td>
                    <td></td>
                    <td><h4>Totali: <strong>{{ $totali_paga }}</strong></h4> </td>
					<td></td>
                </tr>
            @endif
			</table> 

            <table class="table table-striped">
                <tr style="background-color: #e89200;">
                    <td colspan="6"><h1 style="color: white;">STOKU</h1></td>
                </tr>
				<tr>
					<td colspan="6">
					<form method="GET" action="{{ route('admin.depo_add_form') }}" >
						<button style="width: 50%;">SHTO NE DEPO</button>
					</form>
					</td>
				</tr>
				<tr>
					<td><p style="font-weight: bold; font-size: 24px;">Bar Kodi</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Emri</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Sasia</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Cmimi i blerjes</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Cmimi i shitjes</p></td>
					<td></td>
				</tr>
            @if(!empty($produktet))
				@foreach($produktet as $produkti)
				<tr>
					<td>{{ $produkti['bar_kodi'] }}</td>
					<td>{{ $produkti['emri'] }}</td>
					<td>{{ $produkti['sasia'] }}</td>
					<td>{{ $produkti['cmimi_blerjes'] }}</td>
					<td>{{ $produkti['cmimi_shitjes'] }}</td>
					<td>
						<form method="GET" action="{{ route('admin.transfero_form', $produkti->id) }}" >
						<button>TRANSFERO</button>
						</form>
						
					</td>					
				</tr>
				@endforeach
            @endif
			</table> 
		</div>
		
	</div>
</div>

@endsection
