@extends('layouts.user')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Vragenlijsten</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">GelreEnergiek</li>
                        <li class="breadcrumb-item active" aria-current="page">Vragenlijsten</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content content text-center">
        <div class="row">
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">

                <a href="javascript:history.back()" class="btn btn-primary">Terug</a>
            </div>
            <div class="col-md-12 col-lg-8 col-xl-8 col-12 col-sm-12 col-xs-12">
                <h3>Vragenlijsten</h3>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
            <div class="col-md-12 col-lg-8 col-xl-8 col-12 col-sm-12 col-xs-12">
                <alinea class="text-center">
                    Johan is een onafhankelijk platform waar je naartoe kunt gaan om vragenlijsten in te vullen. Dit kun
                    je doen wanneer je bijvoorbeeld nog niet weet met welke thema je graag aan de slag wilt gaan. De
                    uitslag van de vragenlijst geeft je wellicht inzichten en aanknopingspunten om mee aan de slag te
                    gaan. Het aanbod vind je dan vervolgens weer gewoon op Bravis Samen Vitaal.
                    <br />
                    <br />
                    Je moet op deze pagina eerst even inloggen en wanneer je dat nog niet hebt gedaan, eerst een account
                    aanmaken. Dit is omdat er persoonlijke gegevens van je worden opgeslagen en om die gegevens te
                    beveiligen is een inlog noodzakelijk.

                </alinea>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
        <div class="row py-5">
            <div class="col-md-4 col-lg-4 col-xl-4 col-4 col-sm-4 col-xs-4">
                
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-4 col-sm-4 col-xs-4">
                <div class="text-center">
                    <a href="https://app.johan.nl" target="_blank" class="btn btn-primary">Ga naar Johan</a>
                    <a href="https://app.johan.nl/open-registration/3c965d0d49569e0b0094d78ac5591aa415c9222afb1c23fadde5688f0f283f21" target="_blank" class="btn btn-primary">Eerste keer inloggen Johan</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-4 col-sm-4 col-xs-4">
                <div class="text-center">
                </div>
            </div>
        </div>
    </div>
@endsection
