@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row ">
        <div class="col-lg-4 offset-lg-4  my-3">
            <div class="card">
                <div class="card-header">Zarejestruj się</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <label for="email">{{ __('Adres e-mail') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror



                        <div class="form-group text-start">
                            <label for="password">{{ __('Hasło') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group text-start">
                            <label for="password-confirm">{{ __('Potwierdź hasło') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group text-start">
                            <label for="name">{{ __('Imię') }}</label>
                            <input name="firstName" id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" value="{{ old('firstName') }}" required autocomplete="firstName" >

                            @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group text-start">
                            <label for="name">{{ __('Nazwisko') }}</label>
                            <input name="lastName" id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" required autocomplete="lastName" >

                            @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group text-start">
                            <label for="name">{{ __('Pseudonim') }}</label>
                            <input name="nickName" id="nickName" type="text" class="form-control @error('nickName') is-invalid @enderror" value="{{ old('nickName') }}" required autocomplete="nickName" >

                            @error('nickName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group text-start">
                            <label for="gender">{{ __('Płeć') }}</label>


                            <select id="gender" class="form-control" name="gender" required>
                                <option value="1">Mężczyzna</value>
                                <option value="2">Kobieta</value>
                                <option value="3">Inna/Nie chcę podawać</value>
                            </select>

                        </div>

                        <div class="d-grid gap-2 my-2">
                            <div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Zarejestruj') }}
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