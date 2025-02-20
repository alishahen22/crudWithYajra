@extends('layouts.app')



@section('content')
    <!-- BEGIN: Content-->

    <div class="app-content content ">

        <div class="content-overlay"></div>

        <div class="header-navbar-shadow"></div>

        <div class="content-wrapper">

            <div class="content-header row">

                <div class="content-header-left col-md-9 col-12 mb-2">

                    <div class="row breadcrumbs-top">

                        <div class="col-12">

                            <div class="breadcrumb-wrapper">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a
                                            href="/">
                                            الرئيسية
                                            </a>

                                    </li>



                                    <li class="breadcrumb-item active">
                                        المقالات
                                    </li>

                                </ol>

                            </div>

                        </div>

                    </div>

                </div>



            </div>

            <div class="content-body">







                <!-- BEGIN: section -->

                <section id="dashboard-analytics">



                    <!-- List DataTable -->

                    <div class="row">

                        <div class="col-12">

                            <div class="card">







                                @include('dashboard.posts.table')



                                <div class="card-footer clearfix">

                                    <div class="float-right">



                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>

                    <!--/ List DataTable -->



                </section>

                <!-- END: section -->





            </div>

        </div>

    </div>

    <!-- END: Content-->
@endsection
