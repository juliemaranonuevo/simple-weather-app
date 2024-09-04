@extends('master')
@section('meta:title', 'Home')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <city-list :date="{{ json_encode($date) }}"></city-list>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection