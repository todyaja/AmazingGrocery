<nav class="d-flex navbar navbar-expand-lg justify-content-center align-items-center p-0"
    style="background-color: aquamarine">
    <div class="d-flex flex-column w-100 align-items-center justify-content">
        <div class="d-flex flex-row w-100 row p-3">
            <div class="col-4 d-flex align-items-center justify-content-center">
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <a href="/" style="text-decoration: none">
                    <h2 class="text-black">Amazing E-Grocery<h2>
                </a>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-end px-5">

                @auth
                    <form action="{{ url('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning w-100 mx-2 w-50">{{__('text.logout')}}</button>
                    </form>
                @else
                    <a class="btn btn-warning mx-2" href="/register" style="width: fit-content"><button
                            class="btn btn-warning w-100">{{__('text.register')}}</button></a>
                    <a class="btn btn-warning mx-2" href="/login" style="width: fit-content"><button
                            class="btn btn-warning w-100">{{__('text.login')}}</button></a>
                @endauth

            </div>
        </div>
        @auth
            <ul class="navbar-nav bg-light w-100 align-items-center justify-content-evenly">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart">{{__('text.cart')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">{{__('text.profile')}}</a>
                </li>
                @if (auth()->user()->role_id == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="/accountManagement">{{__('text.account_management')}}</a>
                    </li>
                @endif
            </ul>
        @endauth
    </div>

</nav>
