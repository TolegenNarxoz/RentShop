@extends('layouts.adm')

@section('title', 'Add category')

@section('content')

    @if(session('addcategory'))
        <div class="alert alert-success" role="alert">
            {{ session('addcategory') }}
        </div>
    @endif

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create product</h4>
                <form action="{{route('categories.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Code</label>
                        <input name="code" type="text" class="form-control" placeholder="Name">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
