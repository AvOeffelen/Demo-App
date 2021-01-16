@extends('layouts.user')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Vragenlijsten</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">KLANTSAMENVITAAL</li>
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
                <img class="goodhabitz-image" src="storage/images/VRAGENLIJST_Bravis_KlantSamenVitaal.nl_V1.png" height="400">
                <h3></h3>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
       
        <div class="row content content-full text-center">
            <div class="col-sm-6 col-lg-2">
            </div>
            <div class="col-sm-6 col-lg-4">
                <h3>JOHAN</h3>
                <p>Johan is een onafhankelijk platform waar je naartoe kunt gaan om vragenlijsten in te vullen. Dit kun je doen wanneer je bijvoorbeeld nog niet weet met welke thema je graag aan de slag wilt gaan. De uitslag van de vragenlijst geeft je wellicht inzichten en aanknopingspunten om mee aan de slag te gaan. Het aanbod vind je dan vervolgens weer gewoon op Klant Samen Vitaal.

Je moet op deze pagina eerst even inloggen en wanneer je dat nog niet hebt gedaan, eerst een account aanmaken. Dit is omdat er persoonlijke gegevens van je worden opgeslagen en om die gegevens te beveiligen is een inlog noodzakelijk.
</p>
                <a class="btn btn-primary" href="https://app.johan.nl/login" role="button"  target="_blank">Ga naar Johan</a>
                <a class="btn btn-primary" href="https://app.johan.nl/open-registration/6ffe02f32f308dbb1ba8c8d2ace943cff103e613d31360626e61a2815b3a8cec" role="button"  target="_blank">Eerste keer inloggen bij Johan</a>
            </div>
            <div class="col-sm-6 col-lg-4">
                <h3>Whapbot</h3>
                <p>Naast verbinding maken met Johan zijn wij ook in staat om Whappbots voor u te maken. Het is een speels intelligent systeem, een techniek dat gebaseerd is op speelse interactie. Vragenlijsten tot leven laten komen vanuit de intrinsieke motivaties van medewerkers. Het zorgt ervoor dat mensen willen doen wat jij nodig hebben door middel van toepassing van kunstmatige intelligentie.</p>
                <a class="btn btn-primary" href="https://app.whappbot.com/chat/welcome" role="button"  target="_blank">Bekijk een voorbeeld van Whapbot</a>
            </div>
            <div class="col-sm-6 col-lg-2">
            </div>
        </div>

    </div>
@endsection
