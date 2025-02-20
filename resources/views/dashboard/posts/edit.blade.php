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

                                <li class="breadcrumb-item"><a href="/">الرئيسية</a>

                                </li>

                                <li class="breadcrumb-item"><a href="{{ route('dashboard.posts.index') }}">
                                    المقالات
                                </a>

                                </li>

                                <li class="breadcrumb-item active">
                                    تعديل المقالة

                                </li>

                            </ol>

                        </div>

                    </div>

                </div>

            </div>



        </div>

        <div class="content-body">



            <!-- Validation -->

            <section class="bs-validation">

                <div class="row">

                    <!-- Bootstrap Validation -->

                    <div class="col-md-12 col-12">

                        <div class="card">

                            <div class="card-header">

                                <h4 class="card-title">
                                    تعديل المقالة
                                </h4>

                            </div>

                            <div class="card-body">



                                {!! Form::model($post, ['route' => ['dashboard.posts.update', $post->id], 'method' => 'patch', 'files' => true]) !!}



                                <div class="card-body">

                                    <div class="row">

                                        @include('dashboard.posts.fields')

                                    </div>

                                </div>



                                <div class="card-footer">

                                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

                                    <a href="{{ route('dashboard.posts.index') }}" class="btn btn-default">
                                        الغاء
                                    </a>

                                </div>



                                {!! Form::close() !!}



                            </div>

                        </div>

                    </div>

                    <!-- /Bootstrap Validation -->



                </div>

            </section>

            <!-- /Validation -->



        </div>

    </div>

</div>



<!-- END: Content-->



@endsection

@push('js')
<script src="https://cdn.tiny.cloud/1/ncu4y607nayo1coo3vekski4tweqhf55lrvzpu0mnmnsstgw/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>

<script>
    // 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount'
    tinymce.init({
        menubar: false,
        selector: 'textarea.tinyEditor',
        plugins: 'anchor autolink emoticons image lists searchreplace wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        setup: function(editor) {
            editor.on('init', function() {
                // Check if the content direction should be RTL or LTR
                const ID = editor.id.split('_')[1]; // Set to true for RTL, false for LTR
                const content = editor.getBody();
                if (ID === 'ar') {
                    content.style.direction = 'rtl';
                } else {
                    content.style.direction = 'ltr';
                }
            });
        }
    });
</script>

@endpush
