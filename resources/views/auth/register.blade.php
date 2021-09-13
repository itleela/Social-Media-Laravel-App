@extends('welcome')
@section('title','Register Form')

@section('content')


    <div class="row">

        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    Register Form
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


                        @if ($message = Session::get('status'))
                            <div class="alert alert-success alert-block col-12 p-4 mb-4">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif



                    <form method="post" action="{{route('register-form-submit')}}" class="col-12">

                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name"
                                   type="text" class="form-control" id="name"
                                   value="{{old('name')}}"
                                   placeholder="Enter Name">

                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email"
                                   type="email" class="form-control" id="email"
                                   value="{{old('email')}}"
                                   placeholder="Enter email">

                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password"
                                   type="password" class="form-control" id="password" placeholder="Password">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Register</button>
                            <a href="{{route('login-form')}}">Already have account? Login</a>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>

@endsection
