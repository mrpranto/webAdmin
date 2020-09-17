@extends('layouts.master')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-star icon-gradient bg-mean-fruit" aria-hidden="true"></i>
                </div>
                <div> Ad Status

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">

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

            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h4 class="card-title">Ad Status List</h4>
                    <hr>
                    <table class="mb-0 table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>App Id</th>
                            <th>Banner Id</th>
                            <th>Interstitial Id</th>
                            <th>Native Id</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($adStatuses as $adStatus)
                            <tr>
                                <th>{{ $adStatus->id }}</th>
                                <td>{{ $adStatus->name }}</td>
                                <td>{{ optional($adStatus->ad_status_details)->app_id }}</td>
                                <td>{{ optional($adStatus->ad_status_details)->banner_id }}</td>
                                <td>{{ optional($adStatus->ad_status_details)->interstitial_id }}</td>
                                <td>{{ optional($adStatus->ad_status_details)->native_id }}</td>
                                <td>
                                    @if ($adStatus->status == true)
                                        <span class="badge badge-success">ON</span>
                                    @else
                                        <span class="badge badge-danger">OFF</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($adStatus->status == true)
                                        <a href="{{ route('off-status', $adStatus->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-toggle-off"></i> DO OFF</a>
                                    @else
                                        <a href="{{ route('on-status', $adStatus->id) }}" class="btn btn-sm btn-success"><i class="fa fa-toggle-on"></i> DO On</a>
                                    @endif
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal{{ $adStatus->id }}">
                                            <i class="fa fa-pen-square"></i> Edit
                                        </button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection
