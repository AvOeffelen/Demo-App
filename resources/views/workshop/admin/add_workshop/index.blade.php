@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Workshop</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">KLANTSAMENVITAAL</li>
                        <li class="breadcrumb-item" aria-current="page">Workshop</li>
                        <li class="breadcrumb-item active" aria-current="page">Workshop toevoegen</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-full">
        @include('workshop.admin.add_workshop.template.index')
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')

    <script src="{{ mix('/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ mix('/js/plugins/flatpickr/flatpickr.js') }}"></script>
    <script>
        import 'flatpickr/dist/flatpickr.css';
    </script>

    <script>jQuery(function(){ Dashmix.helpers(['ckeditor','flatpickr']); });</script>
@endsection
