<header>
    <div class="header-container">
        <img class="header-logo__img" src="/img/logo.png" alt="logo-icon" width="25px" />
        <input type="text" placeholder="何をお探しですか？" class="search-bar">
        @guest
        <a href="{{ route('login') }}" class="header-button">ログイン</a>
        <a href="{{ route('login') }}" class="header-button">マイページ</a>
        <a href="{{ route('login') }}" class="header-button white-button">出品</a>
        @else
        <a href="{{ route('logout') }}" class="header-button">ログアウト</a>
        <a href="{{ route('profile') }}" class="header-button">マイページ</a>
        <a href="{{ route('items.create') }}" class="header-button white-button">出品</a>
        @endguest
    </div>
</header>