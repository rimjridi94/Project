@extends('modal')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="modal-dialog">

    <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h5 class="modal-title">Ajouter produit</h5>

        </div>

        {!! Form::open(['route' => ['products.store'], 'class' => 'ajax-submit']) !!}

        <div class="modal-body">

            @if (count($errors) > 0)

            {!! form_errors($errors) !!}

            @endif


            @include('products.partials._form')

        </div>

        <div class="modal-footer">
        {!! form_buttons() !!}
        </div>

        {!! Form::close() !!}

    </div>

</div>

@endsection