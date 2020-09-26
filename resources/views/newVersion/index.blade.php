@extends('layouts.master')

@section('title', 'New Version')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-star icon-gradient bg-mean-fruit" aria-hidden="true"></i>
                </div>
                <div> New Version

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

            <div class="col-md-8 col-sm-12">
                <div class="main-card mb-3 card">


                    <div class="card-body">
                        <form action="{{ route('new-version.update', $newVersion->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h4 class="card-title">New Version</h4>
                            <hr>

                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Version Title</label>
                                    <input name="version_title" value="{{ old('version_title') ?: $newVersion->version_title }}" type="text" class="form-control" maxlength="250">
                                </div>


                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">New Feature</label>
                                    <textarea name="new_features" class="form-control" rows="10">{{ old('new_features') ?: $newVersion->new_features }}</textarea>
                                </div>


                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Version Code</label>
                                    <input name="version_code" value="{{ old('version_code') ?: $newVersion->version_code }}" type="text" class="form-control">
                                </div>


                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Version Name</label>
                                <input name="version_name" value="{{ old('version_name') ?: $newVersion->version_name }}" type="text" class="form-control">
                            </div>


                            <div class="position-relative form-check form-ra-inline mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" name="enable" value="1" @if ($newVersion->enable == 1) checked @endif class="form-check-input"> Enable
                                </label>
                            </div>

                            <button class="mt-1 btn btn-primary float-right" type="submit"><i class="fa fa-save"></i> Save</button>
                        </form>
                    </div>

                </div>
            </div>



    </div>



@endsection
