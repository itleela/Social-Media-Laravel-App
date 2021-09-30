@extends('welcome')
@section('title','Upload Post')

@section('content')


    <div class="row">

        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    Upload Post
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


                    <form method="post" action="#" class="col-12" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="email">Name</label>
                            <input name="name"
                                   type="text" class="form-control" id="name"
                                   value="{{old('name')}}"
                                   placeholder="Enter email">

                        </div>
                        <div class="form-group">
                            <label for="description">Descriptions</label>
                            <input name="description"
                                   type="textarea" class="form-control" id="email"
                                   value="{{old('description')}}"
                                   placeholder="Enter email">

                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input name="image"
                                   type="file" class="form-control" id="image" placeholder="Upload Image">
                        </div>


                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <a href="{{route('register-form')}}">Don't have account? Register</a>
                        </div>

                    </form>


                </div>
            </div>

        </div>
    </div>

@endsection
