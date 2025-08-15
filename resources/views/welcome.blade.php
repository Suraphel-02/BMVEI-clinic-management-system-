@extends('layout')
@section('title', 'Welcome')
@section('header', 'Welcome to BMVEI Clinic Management System')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Welcome</div>
                    <div class="card-body">
                        <h2 class="mb-4">BMVEI Clinic Management System</h2>
                        <p class="lead">Efficiently manage patients, appointments, prescriptions, and more.</p>
                        <hr>
                        <p>Login or register to get started.</p>
                        <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
