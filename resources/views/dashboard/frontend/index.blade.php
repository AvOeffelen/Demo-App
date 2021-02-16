@extends('layouts.user')

@section('content')
    <!-- Hero -->
    <div class="bg-body-white">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center bravis-logo">
                <img src="/storage/logo/logo.jpg" height="70">
                <marquee width="60%" direction="left">Tip van de dag: Dit is een tip van de dag</marquee>
                <a href="/verhalen">
                    <i class="fas fa-feather-alt "> Verhalen van medewerkers</i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="content content-boxed">
        @if (Auth()->check())
            <default :user="{{Auth()->user()}}"></default>
        @else
            <default></default>
        @endif
    </div>
    <script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-811640-D7HQSOA217FRMLA7/index.json',
  });
</script>
@endsection
