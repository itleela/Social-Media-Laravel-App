@extends('welcome')
@section('title','Admin Login Form')

@section('content')


    <div class="row">

        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    Admin Login Form
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


                    <form method="post" action="{{route('admin-login-form-submit')}}" class="col-12">

                        @csrf

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


                             <button type="submit" class="btn btn-primary">Admin Login</button>

                    </form>


                </div>
            </div>

        </div>
    </div>

@endsection
