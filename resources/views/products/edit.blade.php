@extends('layouts.adm')

@section('title', 'EDIT PAGE')

@section('content')
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create product</h4>
                        <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input name="name" type="text" class="form-control" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Content</label>
                                <textarea class="form-control" id="exampleTextarea1" name="content" rows="4">{{$product->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Price</label>
                                <input name="price" type="number" class="form-control"  value="{{$product->price}}">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label>File upload</label>--}}
{{--                                <input type="file" name="img[]" class="file-upload-default">--}}
{{--                                <div class="input-group col-xs-12">--}}
{{--                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">--}}
{{--                                    <span class="input-group-append">--}}
{{--                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>--}}
{{--                        </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputCity1">Main IMG</label>
                                <input name="img1" type="text" class="form-control" id="exampleInputCity1" value="{{$product->img1}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">IMG-2</label>
                                <input name="img2" type="text" class="form-control" id="exampleInputCity1" value="{{$product->img2}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">IMG-3</label>
                                <input name="img3" type="text" class="form-control" id="exampleInputCity1" value="{{$product->img3}}">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
@endsection
