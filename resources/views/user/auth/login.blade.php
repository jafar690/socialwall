@extends('user.layout.auth')

@section('content')
<div id="spinner" class="loading" style="display: none;">Loading&#8230;</div>
<div id="app" class="container">
    <div class="login-wrap">
    <div class="login-html">
    

        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
        <form method="POST" action="/user/login" v-on:submit.prevent="Login">
            {{ csrf_field() }}
            <div class="sign-in-htm">
                <div class="group">
                    <label for="user" class="label">Email</label>
                    <input id="user" name="email" type="text" class="input" v-model="loginData.email" >
                    <span class="help-block" v-if="loginerrorMessage.email" >
                           <strong>@{{ loginerrorMessage.email }}</strong>
                    </span>

                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" name="password" type="password" class="input" v-model="loginData.password" data-type="password" >
                    <span class="help-block" v-if="loginerrorMessage.password" >
                           <strong>@{{ loginerrorMessage.password }}</strong>
                    </span>
                </div>
                <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                </div>
                <div class="group">
                    <input type="submit" class="button glow-button" value="Sign In">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="#forgot">Forgot Password?</a>
                </div>
            </div>
        </form>
        <form method="POST" action="/user/register" v-on:submit.prevent="Register">
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Name</label>
                        <input id="user" type="text" class="input" v-model="registerData.name" required>
                        <span class="help-block" v-if="registererrorMessage.name" >
                               <strong>@{{ registererrorMessage.name }}</strong>
                        </span>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="pass" type="text" class="input" v-model="registerData.email" required>
                        <span class="help-block" v-if="registererrorMessage.email" >
                               <strong>@{{ registererrorMessage.email }}</strong>
                        </span>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" v-model="registerData.password" data-type="password" required>
                        <span class="help-block" v-if="registererrorMessage.password" >
                               <strong>@{{ registererrorMessage.password }}</strong>
                        </span>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" class="input" v-model="registerData.password_confirmation" data-type="password" required>
                        <span class="help-block" v-if="registererrorMessage.password_confirmation" >
                               <strong>@{{ registererrorMessage.password_confirmation }}</strong>
                        </span>
                    </div>
                    <div class="group">
                        <input type="submit" class="button glow-button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href=""></a><label for="tab-1">Already Member?</label></a>
                    </div>
                </div>
        </form>
        </div>
    </div>
</div>
</div>

@endsection

@section('scripts')

<script src="{{ url("users/assets/login.js") }}"></script>

@endsection