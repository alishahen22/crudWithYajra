{!! Form::open(['route' => ['dashboard.posts.destroy', $id], 'method' => 'delete']) !!}

<div class='btn-group'>


    <a href="{{ route('dashboard.posts.show', $id) }}" class='btn btn-default btn-xs item-show'>

        <i class="fa fa-eye"></i>

    </a>

    <a href="{{ route('dashboard.posts.edit', $id) }}" class='btn btn-default btn-xs item-edit'>

        <i class="fa fa-edit"></i>

    </a>



    <a href="{{ route('dashboard.posts.destroy', $id) }}" class="btn btn-danger btn-xs item-delete">

        <i class="fa fa-trash"></i>

    </a>






</div>

{!! Form::close() !!}

