<div class="row">
    <div class="col-6">

        @auth
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('post.index')}}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('post.all')}}">All Posts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('post.create')}}">Upload Post</a>
                </li>

            </ul>

        @endauth

    </div>
    <div class="col-6 p-8">
        <div class="float-right">
            <ul class="nav">
                @if (Route::has('login-form'))
                    @auth
                        <li class="nav-item mr-5">
                            <a href="/customers" class="text-danger"><strong>Welcome:-</strong>{{auth()->user()->name}}
                            </a>
                        </li>
                        <li class="nav-item mr-2">
                            <a class="btn btn-outline-danger" href="{{route('logout')}}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item mr-2">
                            <a class="btn btn-primary" href="{{route('login-form')}}">Log in</a>
                        </li>
                        @if (Route::has('register-form'))
                            <li class="nav-item mr-2">
                                <a class="btn btn-primary" href="{{route('register-form')}}">Rgister</a>
                            </li>
                        @endif


                    @endauth
                @endif

            </ul>
        </div>
    </div>

</div>

