@extends('welcome')
@section('title','Edit Post')

@section('content')


    <div class="row">

        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    Edit Post
                </div>
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form method="post" action="{{route('post.update',$post)}}" class="col-12"
                          enctype="multipart/form-data">

                        @method('patch')
                        @csrf

                        @include('user.post.form')

                        <button type="submit" class="btn btn-primary">Upload</button>


                    </form>


                </div>
            </div>

        </div>
    </div>

@endsection
