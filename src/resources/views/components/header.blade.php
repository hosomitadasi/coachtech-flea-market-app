    <header class="header-container">
        <div class="header-icon">
            <img src="{{ asset('img/logo.png') }}">
        </div>
        @if (Route::currentRouteName() !== 'login' && Route::currentRouteName() !== 'register')
        <div class="header-search">
            <input type="text" placeholder="なにをお探しですか？">
        </div>
        <nav class="header-nav">
            @if(Auth::check())
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                ログアウト
            </a>
            @else
            <a href="{{ route('login') }}">ログイン</a>
            @endif
            <a href="{{ Auth::check() ? route('mypage') : route('login') }}">マイページ</a>
            <a href="{{ Auth::check() ? route('sell') : route('login') }}">出品</a>
        </nav>
        @endif
    </header>