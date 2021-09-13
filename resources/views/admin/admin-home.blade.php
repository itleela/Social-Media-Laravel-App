@extends('welcome')
@section('title','Admin Welcome Page')

@section('content')


    <div class="row">

        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    Admin Welcome Page
                </div>
                <div class="card-body">
                    Welcome Admin
                    <a href="{{route('admin-logout')}}">Logout</a>


                </div>
            </div>

        </div>
    </div>

@endsection
