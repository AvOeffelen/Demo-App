@extends('layouts.user')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gelre-Thema's</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{(config('app.name'))}}</li>
                        <li class="breadcrumb-item active" aria-current="page">Gelre-Thema's</li>
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
                <h3>Thema's</h3>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            
            </div>
        </div>
        <div class="row content content-full text-center">
            <div class="col-sm-6 col-lg-2">
            </div>
            <div class="col-sm-6 col-lg-4">
                <img src="storage/images/gezondheid&vitaliteit-thema.png" class="img-fluid">
                <h5>Gezondheid en vitaliteit</h5>
                <p>Bij gezondheid en vitaliteit gaat het over jouw beleving over je eigen gezondheid en energieniveau. Ook geeft het aan in welke mate je zowel lichamelijk als geestelijk aan de eisen van het werk kan voldoen.  </p>
            </div>
            <div class="col-sm-6 col-lg-4">
                <img src="storage/images/motivatie&betrokkenheid-thema.png" class="img-fluid">
                <h5>Motivatie en betrokkenheid</h5>
                <p>Bij motivatie en betrokkenheid gaat het om de dingen die ervoor zorgen dat jij bepaalde dingen doet. Betrokkenheid onderscheidt zich in je betrokkenheid bij Gelre en bij je functie of je rol die je vervult.</p>
            </div>
            <div class="col-sm-6 col-lg-2">
            </div>
        </div>
        <div class="row content content-full text-center">
            <div class="col-sm-6 col-lg-2">
            </div>
            <div class="col-sm-6 col-lg-4">
                <img src="storage/images/ontwikkeling-thema.png" class="img-fluid">
                <h5>Ontwikkeling</h5>
                <p>Bij het thema ontwikkeling gaat het om het beschikken over de juiste kennis en vaardigheden, het benutten van je talenten en capaciteiten. Bij dit thema gaat het om het volgen van opleidingen maar ook het leren van nieuwe vaardigheden voor je functie.</p>
            </div>
            <div class="col-sm-6 col-lg-4">
                <img src="storage/images/wendbaarheid-thema.png" class="img-fluid">
                <h5>Wendbaarheid</h5>
                <p>Bij wendbaarheid gaat het om de manier waarop je in staat bent om te gaan met veranderingen. Kun je meebewegen met de veranderingen die op je afkomen? En ben je bereid om van functie of baan te veranderen.</p>
            </div>
            <div class="col-sm-6 col-lg-2">
            </div>
        </div>
    </div>
@endsection
