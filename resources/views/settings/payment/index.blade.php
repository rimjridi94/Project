@extends('app')

@section('content')
<div class="col-md-12 content-header" >
    <h1><i class="fa fa-money"></i> {{'Methode de paiement'}}</h1>
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

                    {!! Form::open(['route' => ['settings.payment.store']]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nom') !!}
                        <div class="input-group col-md-4">
                        {!! Form::text('name', null, ['class' => "form-control input-sm", 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Enregistrer', ['class="btn btn-sm btn-primary"']) !!}
                    </div>
                    {!! Form::close() !!}

                    <table class="table table-striped table-bordered datatable">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{'Nom'}}</th>
                            <th>{{'Default'}}</th>
                            <th>{{'Action'}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($payment_methods->count() > 0)
                        @foreach($payment_methods as $method)
                        <tr>
                            <td></td>
                            <td>{{ $method->name }}</td>
                            <td>{!! $method->selected  ? '<span class="label label-success">'.'Oui'.'</span>' : '<span class="label label-danger">'.'Non'.'</span>' !!}</td>
                            <td>
                                {!! edit_btn('settings.payment.edit', $method->uuid) !!}
                                {!! delete_btn('settings.payment.destroy', $method->uuid) !!}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection