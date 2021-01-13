@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Updaten</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{config('app.name')}}</li>
                        <li class="breadcrumb-item" aria-current="page">Categorieën</li>
                        <li class="breadcrumb-item active" aria-current="page">Updaten</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content content-full">
        <update-category :category="{{$category}}"></update-category>
    </div>
@endsection
