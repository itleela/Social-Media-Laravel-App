@extends('welcome')
@section('title','User Welcome Page')

@section('content')


    <div class="row">

        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    User Welcome Page
                </div>
                <div class="card-body">
                    Welcome {{auth()->user()->name}}
                    <a href="{{route('logout')}}">Logout</a>


                </div>
            </div>

        </div>
    </div>


    @if($posts->count()>0)

        <div class="row mt-2">

            <div class="col-lg-8">
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
                                <th scope="col" colspan="2">Action</th>

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
                                    <td><a href="{{route('post.edit',$data)}}" class="btn btn-primary">Edit</a></td>

                                    <form action="{{route('post.destroy',$data)}}" method="post">

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

    @endif





@endsection
