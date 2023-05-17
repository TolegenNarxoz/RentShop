@extends('layouts.ind')

@section('title', 'Error page')

@section('content')
    <!-- 404 Section Start -->
    <section class="error-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="content-404 text-center">
                        <h2>You have  no permission</h2>
                        <a href="{{url('/')}}" class="goru-btn">Go Back Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
