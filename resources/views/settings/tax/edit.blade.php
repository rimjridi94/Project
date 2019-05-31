@extends('modal')

@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5 class="modal-title">{{'Modifier Taxe'}}</h5>
        </div>

        {!! Form::model($tax, ['route' => ['settings.tax.update', $tax->uuid], 'method'=>'PATCH', 'class'=>"ajax-submit"]) !!}
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('name','Nom de Taxe') !!}
                {!! Form::text('name', null, ['class' => "form-control input-sm", 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('value', 'valeur de Taxe') !!}
                <div class="input-group col-md-3">
                    {!! Form::input('number','value', null, ['class' => "form-control input-sm",'step'=>'any', 'min'=>'0', 'required']) !!}
                        <span class="input-group-btn ">
                            <button class="btn btn-sm btn-default">%</button>
                        </span>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('selected', 'Default') !!}
                <div class="input-group col-md-3">
                {!! Form::select('selected', array('0'=>'Non',  '1' => 'Oui'),  null, ['class' => "form-control input-sm"]) !!}
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