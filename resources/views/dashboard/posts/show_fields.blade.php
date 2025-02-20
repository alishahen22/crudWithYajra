<!-- Id Field -->

<div class="col-sm-12">

    {!! Form::label('id', 'Id:') !!}

    <p>{{ $post->id }}</p>

</div>


<div class="col-sm-12">

    {!! Form::label('العنوان') !!}

    <p>{{ $post->title }}</p>

</div>



<div class="col-sm-12">

    {!! Form::label('المحتوى') !!}

    <p>{!! $post->body !!}</p>

</div>


<div class="col-sm-12">

    {!! Form::label('الصورة') !!}

    <p>{{ $post->image }}</p>

</div>

<!-- Created At Field -->

<div class="col-sm-12">

    {!! Form::label('created_at', 'تاريخ الإنشاء:') !!}

    <p>{{ $post->created_at->format('Y-m-d H:i:s') }}</p>

</div>

<
