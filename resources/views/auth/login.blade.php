@extends('layouts.FrontLayout')
@section('Front-container')
<section class="signin">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="signin-from-wrapper">
                    <div class="signin-from-inner">
                        <h2 class="title">Sign In</h2>
                        <p>
                            Get quick access to all WordPress premium themes with extensions or/and SP Page Builder Pro with support!
                        </p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="email" />
                            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password"  placeholder="password"/>

                            <div class="forget-link">
                                <div class="condition">
                                    <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
                                    <label for="styled-checkbox-1"></label>
                                    <span>Remember Me</span>

                                </div>

                                <a href="#" class="forget">Forget Password</a>
                            </div>

                            <button type="submit" class="pix-btn">Sign In</button>

                            <p>Don’t have any account? <a href="signup.html">Sign up</a> now.</p>
                        </form>
                    </div>
                    <ul class="animate-ball">
                        <li class="ball"></li>
                        <li class="ball"></li>
                        <li class="ball"></li>
                        <li class="ball"></li>
                        <li class="ball"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="signin-banner">
        <img src="{{asset('Front')}}/media/animated/lock.png" alt="" class="image-one wow pixFadeDown" style="visibility: visible; animation-name: pixFadeDown;">
        <img src="{{asset('Front')}}/media/animated/lock2.png" alt="" class="image-two wow pixFadeUp" style="visibility: visible; animation-name: pixFadeUp;">
    </div>
</section>
@endsection
