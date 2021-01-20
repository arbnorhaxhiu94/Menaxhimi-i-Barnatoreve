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
		<h1>{{$barnatorja->emri}}</h1>
		<hr style="border: 0.5px solid gray; width: 100%;">
		<div class="departments_container">
			@if(session('edit_success'))
			<div class="alert alert-success" style="width: 100%;">Shitja u bë me sukses.</div>
            @endif
			@if(session('no_success'))
			<div class="alert alert-danger" style="width: 100%;">Nuk ka mjaftueshëm në stok.</div>
            @endif
			@if(session('cancel_success'))
			<div class="alert alert-success" style="width: 100%;">Anulimi u bë me sukses.</div>
            @endif
            
            <table class="table table-striped">
                <tr>
                    <td colspan="5"><h3>STOKU</h3></td>
                </tr>
				<tr>
					<td>
						<form method="GET" action="{{ route('user.shitjet', $barnatorja->id) }}">
							<button>SHITJET</button>
						</form>
					</td>
				</tr>
				<tr>
					<td><p style="font-weight: bold; font-size: 24px;">Bar Kodi</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Emri</p></td>
					<td><p style="font-weight: bold; font-size: 24px;">Sasia</p></td>
                    <td><p style="font-weight: bold; font-size: 24px;">Cmimi</p></td>
                    <td></td>
				</tr>
            @if(!empty($produktet))
				@foreach($produktet as $produkti)
				<tr>
					<td>{{ $produkti['bar_kodi'] }}</td>
					<td>{{ $produkti['emri'] }}</td>
					<td>{{ $produkti['sasia'] }}</td>
                    <td>{{ $produkti['cmimi'] }}</td>
                    <td>
                        <form method="GET" action="{{ route('user.shitje_form', $produkti->id) }}">
                            <button>SHITJE</button>
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
