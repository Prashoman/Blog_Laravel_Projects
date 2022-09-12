@extends('layouts.backend_app')

@section('content')

<div class="row">
    <div class="col-2 ">

    </div>
    <div class="col-8 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit {{$ShowCategory->category_name}}</h6>
            </div>
            <div class="card-body">
               <form action="{{ route('category.update',$ShowCategory->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Category_Name</label>
                    <input type="text" name="category_name" class="form-control" value="{{$ShowCategory->category_name}}" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="">Category_Description</label>
                    <textarea class="form-control" name="category_description"   rows="4" placeholder="Enter description">{{$ShowCategory->category_description}}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-info">Edit Category</button>
                </div>

               </form>
            </div>
        </div>
    </div>
    <div class="col-2 ">

    </div>
</div>



@endsection
