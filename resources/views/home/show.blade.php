@extends('master')
@section('meta:title', 'Show')
@section('content')
<div class="content-wrapper">
    <section class="content mt-1">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1 class="city-name-page-label"></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $city }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <place-details
                        :city="{{ json_encode($city) }}"
                    ></place-details>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection