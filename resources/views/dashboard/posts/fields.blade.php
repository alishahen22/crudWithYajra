<!-- Title Ar Field -->

<div class="form-group col-sm-12">

    {!! Form::label('العنوان') !!}

    {!! Form::text('title', null, ['class' => 'form-control']) !!}



    <div class="">


        @if ($errors->has('title'))

            <span class="help-block">

                <strong style="color: red;">{{ $errors->first('title') }}</strong>

            </span>

        @endif

    </div>



</div>






<div class="form-group col-sm-12 col-sm-12">

    {!! Form::label('المحتوى') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control tinyEditor', 'dir' => 'ltr']) !!}



    <div class="">

        @if ($errors->has('body'))

            <span class="help-block">

                <strong style="color: red;">{{ $errors->first('body') }}</strong>

            </span>

        @endif

    </div>



</div>




<div class="form-group col-sm-12">

    {!! Form::label('الصورة') !!}

    <div class="input-group">

        <div class="custom-file">

            {!! Form::file('image', ['class' => 'custom-file-input image']) !!}

            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}

        </div>

    </div>



    <div class="form-group">



        <img src="{{ isset($post) ? url('storage/' . $post->image) : url('admin/app-assets/images/img-upload-placeholder.jpg') }}" width="60px" class="preview-image image-preview" >



    </div>



    <div class="">

        @if ($errors->has('image'))

            <span class="help-block">

                <strong style="color: red;">{{ $errors->first('image') }}</strong>

            </span>

        @endif

    </div>



</div>

<div class="clearfix"></div>

