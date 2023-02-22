<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/"><i class="fa-solid fa-dice-d20"></i> Table Finder</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{asset("assets/documentation.pdf")}}">Dokumentacija <span class="sr-only"></span></a>
            </li>
            @foreach($menu as $m)
                @if($m->visibility==0)
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route($m->route)}}">{{$m->name}} <span class="sr-only"></span></a>
                    </li>
                @endif
                @if(!session()->has('user') && $m->visibility==1)
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route($m->route)}}">{{$m->name}} <span class="sr-only"></span></a>
                        </li>
                    @endif
                @if(session()->has('user') && $m->visibility==2)
                        @if($m->route=='account')
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route($m->route,session()->get('user')->id)}}">{{$m->name}} <span class="sr-only"></span></a>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route($m->route)}}">{{$m->name}} <span class="sr-only"></span></a>
                            </li>
                        @endif
                    @endif
                @if(session()->has('user') && (session()->get('user')->role_id==1) && $m->visibility==3)
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route($m->route)}}">{{$m->name}} <span class="sr-only"></span></a>
                        </li>
                    @endif
            @endforeach
            @if(session()->has('user'))
            <li class="nav-item active">
                <a class="nav-link" href="{{route('logout')}}">Logout <span class="sr-only"></span></a>
            </li>
            @endif
        </ul>
    </div>
</nav>
