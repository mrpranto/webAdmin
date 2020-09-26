@extends('layouts.master')

@section('title', 'Images')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-image icon-gradient bg-mean-fruit" aria-hidden="true"></i>
                </div>
                <div> Image

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->get('success'))
                <div class="alert alert-success">
                    <b><i class="fa fa-check-circle"></i> Success !</b> {{ session()->get('success') }}
                </div>
            @endif

        </div>
    </div>

    <div class="row">

        <div class="col-md-6 offset-md-3 col-sm-12">
            <div class="main-card mb-3 card">


                <div class="card-body">
                    <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <h4 class="card-title">Uploaded Image</h4>
                        <hr>

                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Select Image</label>
                            <br>
                            <input name="image[]" type="file" class="form-control" multiple>
                        </div>


                        <button class="mt-1 btn btn-primary float-right" type="submit"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>

            </div>
        </div>



    </div>


    <div class="row">

        @foreach($images as $image)

            <div class="col-md-4 col-sm-12">
                <div class="main-card mb-3 card">


                    <div class="card-body">
                        <img src="{{ asset($image->image_path) }}" class="img-thumbnail" alt="">
                    </div>

                    <div class="card-footer">

                        <form action="{{ route('images.destroy', $image->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger float-left" type="submit" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i> Delete</button>
                        </form>


                    </div>

                </div>
            </div>

        @endforeach


        <div class="col-sm-12">
            {{ $images->links() }}
        </div>



    </div>



@endsection
