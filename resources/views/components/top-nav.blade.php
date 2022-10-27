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
    <a class="nav-link text-white nav-text" {{ $attributes }} href="{{ route('admin.ticket.search') }}">
        All Tickets
    </a>
</li>