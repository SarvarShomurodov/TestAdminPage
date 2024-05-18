@extends('layouts.adminapp')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Add New Product</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div><br>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Category:</strong></label>
            <select name="category_id" class="form-control">
                @foreach ( $categories as $category )
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Title:</strong></label>
            <input
                type="text"
                name="title"
                class="form-control @error('title') is-invalid @enderror"
                id="inputName"
                placeholder="Title">
            @error('title')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Short Description:</strong></label>
            <textarea
                class="form-control @error('short_description') is-invalid @enderror"
                style="height:150px"
                name="short_description"
                id="inputDetail"
                placeholder="Short Description"></textarea>
            @error('short_description')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Long Description:</strong></label>
            <textarea
                class="form-control @error('long_description') is-invalid @enderror"
                style="height:150px"
                name="long_description"
                placeholder="Long Description"></textarea>
            @error('long_description')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input
                type="file"
                name="image"
                class="form-control @error('image') is-invalid @enderror"
                id="inputImage">
            @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>

  </div>
</div>
@endsection
