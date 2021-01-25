@extends('layouts.user')

<div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Profiel</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">KLANTSAMENVITAAL</li>
                        <li class="breadcrumb-item active" aria-current="page">Profiel</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content content-full text-center">
        <div class="row">
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">

                <a href="javascript:history.back()" class="btn btn-primary">Terug</a>
            </div>
            <div class="col-md-12 col-lg-8 col-xl-8 col-12 col-sm-12 col-xs-12">
                <h3>Profiel</h3>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
    </div>

@section('content')
    <div class="content content-full">
        <profile :user="{{auth()->user()}}"></profile>
    </div>
@endsection
@section('js_after')
@endsection
