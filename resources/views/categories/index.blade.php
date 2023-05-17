@extends('layouts.adm')

@section('title', 'Category page')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Category</h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i=0; $i<count($categories); $i++)
                                        <tr>
                                            <th scope="row">{{$i+1}}</th>
                                            <td>{{$categories[$i]->name}}</td>
                                            <td>{{$categories[$i]->code}}</td>
                                            <td>
                                                <form action="{{route('categories.destroy', $categories[$i]->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm({{__('category_delete')}})" class="btn btn-outline-danger">{{__('messages.cart_delete')}}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
