<div class="collapse navbar-collapse scrollbar" id="navbarStandard">

</div>

<ul  class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
    <li class="nav-item dropdown"><a class="nav-link nav_items dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="Lanugage">Lanugage</a>
        <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="Lanugage">
        <div class="bg-white dark__bg-1000 rounded-3 py-2 ">
            <a class="dropdown-item link-600 fw-medium"  style="align-items: self-start;justify-content: start;" href="{{route('Languaes.change', 'ar')}}">
            <img src="{{asset('newAdmin/assets/img/ar.png')}}" width="30" alt="">
            Arabic
            @if (config('app.locale') == 'ar')
                (Selected)
            @endif
            </a>
            <a class="dropdown-item link-600 fw-medium"  style="align-items: self-start;justify-content: start;" href="{{route('Languaes.change', 'en')}}">
            <img src="{{asset('newAdmin/assets/img/en.png')}}" width="30" alt="">
            English
            @if (config('app.locale') == 'en')
            (Selected)
            @endif
            </a>
        </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="avatar avatar-xl">
            @if (Auth::user()->img)
                    <img  class="rounded-circle" src="{{asset('uplade/user')}}/{{Auth::user()->img}}" width="200" alt="">
            @else
                <img  class="rounded-circle" src="{{ asset('newAdmin/assets/testi-7.png')}}" width="200" alt="">
            @endif
        </div>
        </a>
        <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
        <div class="bg-white dark__bg-1000 rounded-2 py-2">

            <a class="dropdown-item fw-bold  text-center text-warning" href="{{ route('dashboard') }}">
                <span>{{__('validation.Account')}}</span>
            </a>

            <form  method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="dropdown-item text-center m-0 p-0"  href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{__('validation.Logout')}}
                </div>
            </form>
        </div>
        </div>
    </li>
</ul>
