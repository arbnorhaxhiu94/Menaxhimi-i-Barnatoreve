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
	.departments_container {
		width: 100%;
		height: 100%;
		padding: 0;
		display: flex;
		justify-content: center; 
		align-items: center;
		align-items: center;
	}
	.departments {
		width: 250px;
		height: 250px;
		margin: 10px 5px;
		display: flex;
		justify-content: center;
		align-items: center;
		background-color: lightgreen;
		border: 1px solid green;
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
		<div class="departments_container">
			<div class=firstrow>
				<form method="GET" action="{{ route('admin.barnatoret') }}" >
					<button class="departments">
						<h1>Barnatoret</h1>
					</button>
				</form>
				<form method="GET" action="{{ route('admin.punetoret') }}" >
					<button class="departments">
						<h1>Punëtorët</h1>
					</button>
				</form>
			</div>
			<div class=firstrow>
				<form method="GET" action="{{ route('admin.depo') }}" >
					<button class="departments">
						<h1>Depo</h1>
					</button>
				</form>
				<form method="GET" action="{{ route('admin.shitjet') }}" >
					<button class="departments">
						<h1>Shitjet</h1>
					</button>
				</form>
			</div>
		</div>
		
	</div>
</div>

@endsection
