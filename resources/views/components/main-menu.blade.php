<style>
    .navbar {
        justify-content: center;
    }

    .navbar-nav {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .nav-item {
        margin: 0 10px;
    }
</style>

<nav class="navbar navbar-expand-lg bg-grey">
    <div class="container-fluid">
        <a class="navbar-brand d-none" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
            aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupport">
            <ul class="navbar-nav">
                @foreach ($list_menu as $menuitem)
                    <x-main-menu-item :menuitem="$menuitem" />
                @endforeach
            </ul>
        </div>
    </div>
</nav>
