<nav aria-label="breadcrumb ">
    <ol class="breadcrumb float-sm-right">
        @php($url = null)
        @for ($i = 0; $i <= 10; $i++)        
            @if (Request::segment($i))
                <li class="breadcrumb-item @if (Request::segment($i+1) == null) active" aria-current="page @endif">
                    @php($url.=Request::segment($i).'/')                                   
                    <a href="{{ url($url) }}">{{ucwords(Request::segment($i))}}</a>
                </li>
            @endif
        @endfor
    </ol>
</nav>