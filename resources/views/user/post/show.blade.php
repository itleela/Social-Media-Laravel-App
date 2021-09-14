@extends('welcome')
@section('title','Show Post')

@section('content')


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


                    <form method="post" action="{{route('comment.store',$post)}}" class="col-12">

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
                            <li>{{$data->comment}} - ({{$data->user->name}})</li>
                        </ul>

                    @endforeach


                </div>

            </div>

        </div>

@endsection
