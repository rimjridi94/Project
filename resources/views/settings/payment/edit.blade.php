@extends('modal')

@section('content')

<div class="modal-dialog">

    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h5 class="modal-title">{{'Méthode de paiement'}}</h5>
        </div>

        {!! Form::model($payment, ['route' => ['settings.payment.update', $payment->uuid], 'method'=>'PATCH', 'class'=>"ajax-submit"]) !!}
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('name', 'Nom') !!}
                {!! Form::text('name', null, ['class' => "form-control input-sm", 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('selected', 'Default') !!}
                <div class="input-group col-md-3">
                    {!! Form::select('selected', array('0'=>'Non',  '1' => 'Oui'),  null, ['class' => "form-control input-sm", 'required']) !!}
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