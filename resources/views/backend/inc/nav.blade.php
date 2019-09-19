<div class="navbar-side">
    <ul class="navbar-nav navbar-sidenav bg-light-dark" id="exampleAccordion">
      @foreach($menu as $key => $value)
        <li class="nav-item {{ url()->current() == url('admin/'.$key) ? 'active' : null }}" data-toggle="tooltip" data-placement="right" title="{{ $value['title'] }}">
            @if(@$value['submenu'])
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#{{$value['id']}}" data-parent="#exampleAccordion">
            @else
              <a class="nav-link" href="/admin/{{$key}}">
            @endif
            <i class="ti i-cl-1 {{ $value['icon'] }}"></i>
            <span class="nav-link-text">{{ $value['title'] }}</span>
          </a>
          @if(@$value['submenu'])
             <ul class="sidenav-second-level collapse" id="{{ $value['id'] }}">
                @foreach($value['submenu'] as $subKey => $subValue)
                   <li>
                     <a href="{{ url('/admin/'.$key.'/'.$subKey)  }}">{{ $subValue }}</a>
                   </li>
                @endforeach
             </ul>
          @endif
        </li>
      @endforeach

    </ul>
</div>
