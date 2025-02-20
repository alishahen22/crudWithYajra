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

                                <li class="breadcrumb-item"><a href="/">
                                    الرئيسية
                                </a>

                                </li>

                                <li class="breadcrumb-item"><a href="{{ route('dashboard.posts.index') }}">
                                    المقالات
                                </a>

                                </li>

                                <li class="breadcrumb-item active">
                                    عرض المقالة

                                </li>

                            </ol>

                        </div>

                    </div>

                </div>

            </div>



        </div>

        <section id="profile-info">

            <div class="row">

                <!-- left profile info section -->

                <div class="col-lg-12 col-12 order-2 order-lg-1">

                    <!-- about -->

                    <div class="card">

                        <div class="card-body">



                            <h5 class="mb-75">كل البيانات</h5>













                            <div class="mt-2">

                                <h5 class="mb-75 div-bold">العنوان  : </h5>

                                <p class="card-text p-bold">{{ $post->title  }}</p>

                            </div>









                            <div class="mt-2">

                                <h5 class="mb-75 div-bold">المحتوى : </h5>

                                <p class="card-text p-bold">{!! $post->body  !!}</p>

                            </div>

                            <div class="mt-2">

                                <h5 class="mb-75 div-bold">الصورة : </h5>

                                <p class="card-text p-bold"><img src="{{ asset('storage/' . $post->image) }}" alt="صورة المقالة" style="width: 100px; height: 100px;"></p>

                            </div>



                        </div>

                    </div>

                    <!--/ about -->

                </div>

                <!--/ left profile info section -->



            </div>





        </section>

    </div>

</div>

<!-- END: Content-->



@endsection

