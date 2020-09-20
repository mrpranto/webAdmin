@extends('layouts.master')

@section('title', 'Ad Setting')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-cog icon-gradient bg-mean-fruit" aria-hidden="true"></i>
                </div>
                <div> Ad Setting

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

        @foreach($adSettings as $adSetting)


            <div class="col-md-6 col-sm-12">
                <div class="main-card mb-3 card">


                    <div class="card-body">
                        <form action="{{ route('ad-setting.update', $adSetting->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <h4 class="card-title">{{ $adSetting->name }}</h4>
                            <hr>

                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">{{ $adSetting->name }} Publisher Id</label>
                                <input name="publisher_id" value="{{ old('publisher_id') ?: $adSetting->publisher_id }}" type="text" class="form-control" maxlength="250">
                            </div>

                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">{{ $adSetting->name }} App Id</label>
                                <input name="app_id" value="{{ old('app_id') ?: $adSetting->app_id }}" type="text" class="form-control" maxlength="250">
                            </div>

                            <div class="position-relative form-check form-ra-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="status" value="1" @if ($adSetting->status == 1) checked @endif class="form-check-input"> On
                                </label>
                            </div>
                            <div class="position-relative form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="status" value="0" @if ($adSetting->status == 0) checked @endif class="form-check-input"> Off
                                </label>
                            </div>

                            <button class="mt-1 btn btn-primary float-right" type="submit"><i class="fa fa-save"></i> Save</button>
                        </form>
                    </div>

                </div>
            </div>


        @endforeach


    </div>



@endsection
