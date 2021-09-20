@extends('welcome')
@section('title','User Welcome Page')

@section('content')


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
                                <th scope="col">Created By</th>
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
                                    <td>{{$data->user->name}}</td>
                                    <td>
                                        @if($data->image)
                                            <img src="{{asset('storage/'.$data->image)}}" alt="icon" width="120px"
                                                 height="120px"/>
                                        @else
                                            N-A
                                        @endif
                                    </td>


                                    <td><a href="{{route('post.show',$data)}}" class="btn btn-primary">Show</a></td>

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
