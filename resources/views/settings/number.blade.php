@extends('app')

@section('content')
<div class="col-md-12 content-header" >
    <h1><i class="fa fa-file-text"></i> {{'Préfixe de numéro'}}</h1>
</div>

<section class="content">
    <div class="row">
        <div class="col-md-3">
            @include('settings.partials._menu')
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body">
                    @if (count($errors) > 0)
                    {!! form_errors($errors) !!}
                    @endif

                    @if($setting)
                    {!! Form::model($setting, ['route' => ['settings.number.update', $setting->uuid], 'method'=>'PATCH']) !!}
                    @else
                    {!! Form::open(['route' => ['settings.number.store']]) !!}
                    @endif

                    <div class="form-group">
                        {!! Form::label('client_number', 'Préfixe de numéro Client') !!}
                        {!! Form::text('client_number', null, ['class' => "form-control input-sm"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('invoice_number', 'Préfixe de numéro Facture') !!}
                        {!! Form::text('invoice_number', null, ['class' => "form-control input-sm"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('estimate_number','Préfixe de numéro Devis' ) !!}
                        {!! Form::text('estimate_number', null, ['class' => "form-control input-sm"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Enregistrer', ['class="btn btn-sm btn-primary"']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</section>

@endsection