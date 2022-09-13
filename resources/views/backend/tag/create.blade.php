@extends('layouts.backend_app')

@section('content')

<div class="row">
    <div class="col-2 ">

    </div>
    <div class="col-8 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Tag</h6>
            </div>
            <div class="card-body">
               <form action="{{ route('tag.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Tag_Name</label>
                    <input type="text" name="tag_tittle" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="">tag_Description</label>
                    <textarea class="form-control" name="tag_description"  rows="4" placeholder="Enter description"></textarea>
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
