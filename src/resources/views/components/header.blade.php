    <header class="header-container">
        <div class="header-icon">
            <img src="{{ asset('img/logo.png') }}">
        </div>
        @if (Route::currentRouteName() !== 'login' && Route::currentRouteName() !== 'register')
        <div class="header-search">
            <input type="text" placeholder="なにをお探しですか？">
        </div>
        <nav class="header-nav">
            <a href="{{ route('login') }}">{{ Auth::check() ? 'ログアウト' : 'ログイン' }}</a>
            <a href="{{ Auth::check() ? route('profile') : route('login') }}">マイページ</a>
            <a href="{{ Auth::check() ? route('sell') : route('login') }}">出品</a>
        </nav>
        @endif
    </header>