<nav class="mb-3">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-start align-items-center">
                <h3 class="brand">MyPortfolio</h3>
            </div>
            <div class="col d-flex justify-content-center align-items-center">
                <div class="mx-2 p-2">
                    <a class="link-hover nav-links {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="mx-2 p-2 ">
                    <a class="link-hover nav-links {{ request()->is('admin/projects') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">Home</a>
                </div>
                <div class="mx-2 p-2 ">
                    <a class="link-hover nav-links {{ request()->is('admin/types') ? 'active' : '' }}" href="{{ route('admin.types.index') }}">Tipi</a>
                </div>
                <div class="mx-2 p-2 ">
                    <a class="link-hover nav-links {{ request()->is('admin/technologies') ? 'active' : '' }}" href="{{ route('admin.technologies.index') }}">Tecnologie</a>
                </div>
            </div>
            <div class="col d-flex justify-content-end align-items-center py-2">
                <span class="text-light mx-3">Welcome {{ auth()->user()->name }}!</span>
                <div class="">
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-info m-0">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</nav>

<style lang="scss" scoped>
    .brand {
        color: #53D4BE;
    }

    .nav-links {
        color: #53D4BE;
        border: 2px #53D4BE;
        transition: ease 0.3s;
    }

    .link-hover:hover {
        color: white;
    }

    .active {
        color: #ffffff;
        font-weight: bold;
        text-decoration: underline;
        text-shadow: 0 0 10px #53D4BE;
    }
</style>
