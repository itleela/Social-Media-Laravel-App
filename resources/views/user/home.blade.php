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

@endsection
