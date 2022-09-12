@extends('layouts.backend_app')

@section('content')

<div class="row">
    <div class="col-2 ">

    </div>
    <div class="col-8 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
            </div>
            <div class="card-body">
               <form action="{{ route('category.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Category_Name</label>
                    <input type="text" name="category_name" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="">Category_Description</label>
                    <textarea class="form-control" name="category_description"  rows="4" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-info">Submit</button>
                </div>

               </form>
            </div>
        </div>
    </div>
    <div class="col-2 ">

    </div>
</div>



@endsection
