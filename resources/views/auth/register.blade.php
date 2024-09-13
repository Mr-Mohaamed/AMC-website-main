@extends('layouts.FrontLayout')
@section('Front-container')
<section class="signin">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="signin-from-wrapper">
                    <div class="signin-from-inner">
                        <h2 class="title">Signup Now!</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="name" required autofocus autocomplete="name" />
                            <input  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="email" autocomplete="username" />
                            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"  placeholder="password"/>
                            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="password confirmation" />

                            <div class="forget-link">
                                <div class="condition">
                                    <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
                                    <label for="styled-checkbox-1"></label>
                                    <span>I wish to recieve newsletters, promotions and news from.</span>

                                </div>
                            </div>
                            <button type="submit" class="pix-btn">Sign Up</button>
                            <p>Already have an account? <a href="signin.html">Sign in</a> now.</p>
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
                <!-- /.signin-from-wrapper -->
            </div>
        </div>
    </div>
    <div class="signin-banner">
        <img src="{{asset('Front')}}/media/animated/lock.png" alt="" class="image-one wow pixFadeDown" style="visibility: visible; animation-name: pixFadeDown;">
        <img src="{{asset('Front')}}/media/animated/lock2.png" alt="" class="image-two wow pixFadeUp" style="visibility: visible; animation-name: pixFadeUp;">
</section>
@endsection
