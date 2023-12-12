<nav>
    <p>Jobs Hunt</p>
    <ul>
        <li>
            <a href="{{ route("home") }}">Home</a>
        </li>
        @if(!Auth::check())

            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}">Register</a>
            </li>
            @else
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="border-0 bg-transparent p-0 text-primary" type="submit">Logout</button>
                </form>
            </li>

        @endif

    </ul>
</nav>