<nav>
    <div class="logo">
        <a href="#">
            GAME<span>HUB</span>
        </a>
    </div>

    <ul>
        <li><a href="{{ asset('home') }}">Home</a></li>
        <li><a href="#">Browse</a></li>
        <li><a href="{{ asset('mygames') }}">MyGame</a></li>
        <li><a href="{{ asset('profile') }}">Profile</a></li>
        @if (session()->has('email'))
        <li class="signin_button"><a href="{{ asset('signout_process') }}">Sign Out</a></li>
        @else
        <li class="signin_button"><a href="{{ asset('signin') }}">Sign in</a></li>
        @endif
    </ul>

    <div class="menu-toggle">
        <input type="checkbox">
        <span></span>
        <span></span>
        <span></span>

    </div>
</nav>

<script>
    const toggleMenu = document.querySelector('.menu-toggle input');
    const nav = document.querySelector('nav ul');

    toggleMenu.addEventListener('click', function(){
        nav.classList.toggle('slide');
    });
</script>
