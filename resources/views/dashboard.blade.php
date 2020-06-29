@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Dashboard</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-full">
        <div>
            <div class="row">
                <div class="col-md-4 col-xl-4 invisible" data-toggle="appear">
                    <a class="block block-rounded block-link-pop" href="#">
                        <div
                            class="block-content block-content-full d-flex align-items-center justify-content-between text-primary">
                            <div>
                                <i class="fa fa-4x fa-chalkboard-teacher"></i>
                            </div>
                            <div class="ml-3 text-right">
                                <p class="text-muted mb-0">
                                    Workshops
                                </p>
                                <p class="font-size-h3 mb-0">
                                    35
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-xl-4 invisible" data-toggle="appear">
                    <a class="block block-rounded block-link-pop" href="#">
                        <div
                            class="block-content block-content-full d-flex align-items-center justify-content-between text-primary">
                            <div>
                                <i class="fa fa-4x fa-user"></i>
                            </div>
                            <div class="ml-3 text-right">
                                <p class="text-muted mb-0">
                                    Gebruikers
                                </p>
                                <p class="font-size-h3 mb-0">
                                    2354
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-xl-4 invisible" data-toggle="appear">
                    <a class="block block-rounded block-link-pop" href="#">
                        <div
                            class="block-content block-content-full d-flex align-items-center justify-content-between text-primary">
                            <div>
                                <i class="fa fa-4x fa-bicycle"></i>
                            </div>
                            <div class="ml-3 text-right">
                                <p class="text-muted mb-0">
                                    Een willekeurige statistiek
                                </p>
                                <p class="font-size-h3 mb-0">
                                    756
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row row-deck">
                <div class="col-xl-12 invisible" data-toggle="appear">
                    <!-- Users -->
                    <div class="block block-rounded block-mode-loading-refresh">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Aantal workshops</h3>
                            <div class="block-options">
                                <button class="btn light btn-light text-primary" data-toggle="click-ripple">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                                <thead>
                                <tr class="text-uppercase">
                                    <th class="font-w700">Workshop naam</th>
                                    <th class="d-none d-sm-table-cell font-w700">Periode</th>
                                    <th class="font-w700 text-center" style="width: 60px;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lorem ipsum</td>
                                        <td>22-22-2020</td>
                                        <td>
                                            <button class="btn light btn-light text-primary" data-toggle="click-ripple">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lorem ipsum</td>
                                        <td>22-22-2020</td>
                                        <td>
                                            <button class="btn light btn-light text-primary" data-toggle="click-ripple">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lorem ipsum</td>
                                        <td>22-22-2020</td>
                                        <td>
                                            <button class="btn light btn-light text-primary" data-toggle="click-ripple">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lorem ipsum</td>
                                        <td>22-22-2020</td>
                                        <td>
                                            <button class="btn light btn-light text-primary" data-toggle="click-ripple">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lorem ipsum</td>
                                        <td>22-22-2020</td>
                                        <td>
                                            <button class="btn light btn-light text-primary" data-toggle="click-ripple">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row py-2">
                                <div class="col">
                                    <div class="text-right">
                                        <button class="btn btn-sm btn-primary text-white"
                                                data-toggle="click-ripple">
                                            Bekijken
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Users -->
                </div>
            </div>
    </div>
    <!-- END Page Content -->
@endsection
