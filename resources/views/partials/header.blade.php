<nav class="">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-start align-items-center">
                <a class="brand link-hover" href="{{ route('admin.projects.index') }}">MyPortfolio</a>
            </div>
            <div class="col d-flex justify-content-center align-items-center">
                <div class="mx-2 p-2">
                    <a class="link-hover nav-links" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="mx-2 p-2 ">
                    <a class="link-hover nav-links" href="{{ route('admin.projects.index') }}">Home</a>
                </div>
                <div class="mx-2 p-2 ">
                    <a class="link-hover nav-links" href="{{ route('admin.types.index') }}">Tipi</a>
                </div>
            </div>
            <div class="col d-flex justify-content-end align-items-center py-2">
                <span class="text-light mx-3">Welcome {{ auth()->user()->name }}!</span>
            </div>
            <div class="col">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-info mx-3">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<style lang="scss" scoped>
    .brand {
        color: #53D4BE;
        font-size: 25px;
        transition: ease 0.3s;

    }

    .nav-links {
        color: #53D4BE;
        border: 2px #53D4BE;
        transition: ease 0.3s;
    }

    .link-hover:hover {
        color: white;
    }
</style>
