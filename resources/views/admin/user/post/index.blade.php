@extends('admin.layouts.admin-master')
@section('title','My Post')

@section('styles')

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>


@endsection
<main>


    @section('content')
        @if($posts->count()>0)

            <div class="container-fluid px-4">
                <h1 class="mt-4">All Post</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('user-dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Post</li>
                </ol>


                <div class="py-2">
                    <a class="btn btn-primary" href="{{route('post.create')}}">Create</a>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All Post
                    </div>
                    <div class="card">

                        {{--                @if(Session::has('status'))--}}
                        {{--                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>--}}
                        {{--                @endif--}}


                        <div class="card-body">


                            <table class="table table-striped" id="tbl">


                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" colspan="3">Action</th>

                                </tr>

                                </thead>

                                <tbody>


                                @foreach ($posts as $data)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->description}}</td>
                                        <td>
                                            @if($data->image)
                                                <img src="{{asset('storage/'.$data->image)}}" alt="icon" width="120px"
                                                     height="120px"/>
                                            @else
                                                N-A
                                            @endif
                                        </td>


                                        <td><a href="{{route('post.show',$data)}}" class="btn btn-primary">Show</a></td>

                                        <form action="{{route('post.destroy',$data)}}" method="post">

                                            <td><a href="{{route('post.edit',$data)}}" class="btn btn-primary">Edit</a>
                                            </td>


                                            @method('DELETE')
                                            @csrf
                                            <td>
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </td>
                                        </form>

                                    </tr>
                                @endforeach


                                </tbody>


                            </table>


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
@endif
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
