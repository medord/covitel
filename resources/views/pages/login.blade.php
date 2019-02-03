@extends('layouts.mainLayout')

@section('pageContent')
   <div class="container">
        <div class="app-container">
            <div class="app-login-box">
                <div class="app-login-box-user">
                    <img src="{{asset('img/user/no-image.png')}}">
                </div>
                <div class="app-login-box-title">
                    <div class="subtitle">Sign in to your account</div>
                </div>
                <div class="app-login-box-container">
                    <form action="/user/auth" method="post">
                        @csrf
                        @if(session('emailError'))
                        <div class="form-group has-error has-feedback">
                        @else
                        <div class="form-group">
                        @endif
                            <input type="text" class="form-control" name="usermail" placeholder="Email" data-validation="email">
                        </div>
                        @if(session('passwordError'))
                        <div class="form-group has-error has-feedback">
                        @else
                        <div class="form-group">
                        @endif
                            <input type="password" class="form-control" name="userpassword" placeholder="Mot de passe">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <button class="btn btn-success btn-block">Se Connecter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

