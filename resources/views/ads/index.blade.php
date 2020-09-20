@extends('layouts.master')

@section('title', 'Ads')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-image icon-gradient bg-mean-fruit" aria-hidden="true"></i>
                </div>
                <div> Ads

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

        @foreach($ads as $ad)


            <div class="col-md-6 col-sm-12">
                <div class="main-card mb-3 card">


                    <div class="card-body">
                        <form action="{{ route('ads.update', $ad->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h4 class="card-title">Ad {{ $ad->name }}</h4>
                            <hr>

                            <div id="others_{{ $ad->id }}"  @if ($ad->customize_banner == 1) hidden @endif>

                                @if ($ad->id != 2)

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">{{ $ad->name }} Admob Id</label>
                                        <input name="admob_id" value="{{ old('admob_id') ?: $ad->admob_id }}" type="text" class="form-control" maxlength="250">
                                    </div>

                                @endif


                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">{{ $ad->name }} Facebook Id</label>
                                    <input name="fb_id" value="{{ old('facebook_id') ?: $ad->fb_id }}" type="text" class="form-control" maxlength="250">
                                </div>

                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">{{ $ad->name }} Display Id</label>
                                    <select name="display_type" class="form-control">
                                        @foreach($display_types as $key => $display_type)

                                            <option {{ old('display_type') == $key ? 'selected' : '' }} {{ $ad->display_type_id == $key ? 'selected' : '' }} value="{{ $key }}">{{ $display_type .' '. $ad->name}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                @if ($ad->id != 2 && $ad->id != 3 && $ad->id != 5)
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Click between {{ $ad->name }} Id</label>
                                        <input name="click_between" value="{{ old('click_between') ?: $ad->click_between }}" type="number" class="form-control" >
                                    </div>
                                @endif

                            </div>

                            @if ($ad->id == 2 || $ad->id == 3 || $ad->id == 5)

                                <div class="position-relative form-check form-ra-inline mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="customize_banner" id="customize_banner_check_{{ $ad->id }}" onchange="openCustomizeOption({{ $ad->id }})" value="1" @if ($ad->customize_banner == 1) checked @endif class="form-check-input"> Customize Banner
                                    </label>
                                </div>

                                <div id="customize_banner_{{ $ad->id }}" @if ($ad->customize_banner == 0) hidden @endif>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">{{ $ad->name }} Title</label>
                                        <input name="banner_title" value="{{ old('banner_title') ?: optional($ad->customizeBanner)->title }}" type="text" class="form-control" maxlength="250">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">{{ $ad->name }} Link</label>
                                        <input name="banner_link" value="{{ old('banner_link') ?: optional($ad->customizeBanner)->link }}" type="text" class="form-control" maxlength="250">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">{{ $ad->name }} Image</label>
                                        <input name="banner_image" type="file" class="form-control">
                                    </div>

                                    @if (optional($ad->customizeBanner)->image)
                                        <div class="position-relative form-group">
                                            <img src="{{ asset(optional($ad->customizeBanner)->image) }}" class="img-thumbnail" >
                                        </div>
                                    @endif


                                </div>

                            @endif




                            <button class="mt-1 btn btn-primary float-right" type="submit"><i class="fa fa-save"></i> Save</button>
                        </form>
                    </div>

                </div>
            </div>


        @endforeach


    </div>



@endsection
