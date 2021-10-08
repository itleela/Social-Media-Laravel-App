@extends('admin.layouts.admin-master')
@section('title','Show Post')

@section('styles')

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>


@endsection
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Show Post</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('user-dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Show Post</li>
            </ol>

            <div class="row">

                <div class="col-lg-8">
                    <div class="card">

                        <div class="card-header">
                            Show Post
                        </div>
                        <div class="card-body d-flex justify-content-between">


                            <div>
                                <div class="flex justify-content-between">
                                    @if($post->image)
                                        <img src="{{asset('storage/'.$post->image)}}" alt="icon" width="150px"
                                             height="150px"/>
                                    @endif

                                </div>

                                <div class="flex justify-content-between mt-2">
                                    <div>POST NAME :::: {{$post->name}}</div>
                                </div>

                                <div class="flex justify-content-between">
                                    <div>POST DESC :::: {{$post->description}}</div>
                                </div>
                            </div>


                            <form method="post" action="{{route('comment.store',$post)}}" class="col-12 m-4">

                                @csrf

                                <input type="text" name="comment" placeholder="Enter Comment">

                                <button type="submit" class="btn btn-primary">Submit</button>


                            </form>


                        </div>
                    </div>

                </div>
            </div>





            <div class="row mt-4">

                <div class="col-lg-8">
                    <div class="card">

                        <div class="card-header">
                            Comments
                        </div>
                        <div class="card-body">

                            @foreach($comments as $data)
                                <ul>
                                    <li>{{$data->comment}} -(
                                        @if(auth()->id() == $data->user->id)
                                            YOU
                                        @else
                                            {{ $data->user->name}}
                                        @endif
                                         )
                                    </li>
                                </ul>

                            @endforeach


                        </div>

                    </div>

                </div>
            </div>
            </div>

    </main>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2021</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>

@endsection

@section('script')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script src="{{asset('admin/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('admin/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/assets/demo/chart-bar-demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('admin/js/datatables-simple-demo.js')}}"></script>


@endsection

