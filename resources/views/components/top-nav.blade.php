<li class="nav-item ">
    <a class="nav-link text-white nav-text" {{ $attributes }} href="{{ route('admin.ticket.create') }}">
        Create New Ticket
    </a>
</li>
<li class="nav-item ">
    <a class="nav-link text-white nav-text" {{ $attributes }} href="{{ route('admin.ticket.check_in_ticket') }}">
        Check Boarding Pass
    </a>
</li>
<li class="nav-item ">
    <a class="nav-link text-white nav-text" {{ $attributes }} href="{{ route('admin.ticket.search',['departure_date'=>date('Y-m-d')]) }}">
        All Tickets
    </a>
</li>

@if(auth()->user()->user_role->id == 1)
<li class="nav-item dropdown">
    <a class="nav-link text-white nav-text dropdown-toggle " {{ $attributes }} href="#">
        Settings
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item nav-text" href="{{ route('admin.ship.index')  }}">
                <span class="link-title">Ships</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item nav-text" href="{{ route('admin.stations.index')  }}">
                <span class="link-title">Stations</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item nav-text" href="{{ route('admin.seat.index')  }}">
                <span class="link-title">Seats</span>
            </a>
        </li>
    </ul>
</li>
@endif