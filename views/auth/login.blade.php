@extends('layouts.main')
@section('content')

@include('layouts.navbar')

<style type="text/css">
    #loginContainer {
        margin-bottom: 5%;
        width: 50%;
    }

    #loginContainer2 {
        border: none;
        margin-top: 50%;
    }

    #loginContainer2 input{
        border: 1px solid gray;
        background-color: #f7f7f7;
        border-radius: 0px;
        outline: none;
        box-shadow: none;
    }

    #loginContainer2 button {
        background-color: #099619;
        color: white;
        font-weight: bold;
        font-size: 14px;
        letter-spacing: 3px;
        border: 1px solid #099619;
        margin: 0px;
    }

    #loginContainer2 button:hover {
        background-color: #f7f7f7;
        color: #099619;
    }

    #card_header {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 5px;
    }

    @media only screen and (max-width: 1000px) {
        #loginContainer {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 90%;
        }

        #loginContainer2 {
            margin-top: 30%;
        }
    }

</style>
<div class="container" id="loginContainer">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div id="loginContainer2">
                <div id="card_header">{{ __('LOG IN') }}</div>

                <div class="card-body" >
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf

                        <div class="form-group" >
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label> -->

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="col-md-12 btn">
                                    {{ __('LOG IN') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
