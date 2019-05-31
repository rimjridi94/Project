@extends('modal')

@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5 class="modal-title">{{'Modifier Devis'}</h5>
        </div>
        {!! Form::model($currency, ['route' => ['settings.currency.update', $currency->uuid], 'method'=>'PATCH', 'class'=>"ajax-submit"]) !!}
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('name', 'Nom Devis') !!}
                {!! Form::text('name', null, ['class' => "form-control input-sm", 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('symbol', 'Symbol') !!}
                <div class="input-group col-md-4">
                    {!! Form::text('symbol', null, ['class' => "form-control input-sm", 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('selected', 'Default') !!}
                <div class="input-group col-md-3">
                    {!! Form::select('selected', array('0'=>'No',  '1' => 'Yes'),  null, ['class' => "form-control input-sm"]) !!}
                </div>
            </div>
        </div>
        <div class="modal-footer">
        {!! form_buttons() !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection