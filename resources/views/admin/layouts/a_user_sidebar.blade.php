<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>

                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Post</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                     Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>


                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
{{--                        <a class="nav-link" href="{{route('post.index')}}">Upload Post</a>--}}
                        <a class="nav-link" href="{{route('post.all')}}">All Post</a>
                       <a class="nav-link" href="{{route('post.index')}}">My Post</a>
                    </nav>
                </div>


                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                     data-bs-parent="#sidenavAccordion">

                </div>

        </div>
        </div>
    </nav>
</div>