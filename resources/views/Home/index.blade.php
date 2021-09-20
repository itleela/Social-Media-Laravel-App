@extends('welcome')
@section('title','Home')

@section('content')

    <h1>Home Page</h1>

    <div class="row">

        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    Posts
                </div>
                @foreach($post as $data)
                    <div class="card-body d-flex justify-content-between">


                        <div>

                            <div class="flex justify-content-between">
                                @if($data->image)
                                    <img src="{{asset('storage/'.$data->image)}}" alt="icon" width="150px"
                                         height="150px"/>
                                @endif

                            </div>

                            <div class="flex justify-content-between mt-2">
                                <div>POST NAME :::: {{$data->name}}</div>
                            </div>

                            <div class="flex justify-content-between">
                                <div>POST DESC :::: {{$data->description}}</div>
                            </div>
                            <div class="card">

                                <div class="card-header">
                                    Comments
                                </div>
                                <div class="card-body">



                                </div>

                            </div>

                        </div>
                        <form method="post" action="#" class="col-12">

                            @csrf

                            <input type="text" name="comment" placeholder="Enter Comment">

                            <button type="submit" class="btn btn-primary">Submit</button>


                        </form>


                    </div>
                @endforeach
            </div>

        </div>

    </div>





@endsection
