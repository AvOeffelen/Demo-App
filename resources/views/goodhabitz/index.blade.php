@extends('layouts.user')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">GoodHabitz</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">ASML</li>
                        <li class="breadcrumb-item active" aria-current="page">GoodHabitz</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content content text-center">
    
        <div class="row">
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
                <a href="javascript:history.back()" class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-12 col-lg-8 col-xl-8 col-12 col-sm-12 col-xs-12">
                <h3>GoodHabitz</h3>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
            <div class="col-md-12 col-lg-8 col-xl-8 col-12 col-sm-12 col-xs-12">
                <alinea class="text-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/mEiaOv3Z8zs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </alinea>
                <h1>So how do we do it? </h1>
                <p>Well, it’s not really up to us: you and your co-workers are in charge. You decide what you want to learn, and where, when and how you want to learn it. We simply provide kick-ass content that will keep you hooked. Done learning? Impossible. We’re always adding new titles.</p>
                <a href="https://www.goodhabitz.com/en-gb/" class="btn btn-primary" target="_blank">Discover GoodHabitz</a>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
       
    </div>
@endsection
