@extends('app')

@section('content')

<div class="col-md-12 content-header" >
    <h1><i class="fa fa-th-large"></i> {{'Taxe Config'}}</h1>
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

                 {!! Form::open(['route' => ['settings.tax.store']]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nom de Taxe') !!}
                        <div class="input-group col-md-4">
                        {!! Form::text('name', null, ['class' => "form-control input-sm required", 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('value', 'valeur de Taxe') !!}
                        <div class="input-group col-md-4">
                        {!! Form::input('number','value', null, ['class' => "form-control input-sm required",'step'=>'any', 'min'=>'0', 'required']) !!}
                            <span class="input-group-btn ">
                                <button class="btn btn-sm btn-default">%</button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Enregister', ['class="btn btn-sm btn-primary"']) !!}
                    </div>
                    {!! Form::close() !!}

                    <table class="table table-striped table-bordered datatable">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{'Nom'}}</th>
                            <th>{{'valeur'}}</th>
                            <th>{{'Default'}}</th>
                            <th>{{'Action'}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($taxes->count() > 0)
                            @foreach($taxes as $tax)
                            <tr>
                                <td></td>
                                <td>{{ $tax->name }}</td>
                                <td>{{ $tax->value }}%</td>
                                <td>{!! $tax->selected  ? '<span class="label label-success">'.'Oui'.'</span>' : '<span class="label label-danger">'.'Non'.'</span>' !!}</td>
                                <td>
                                   {!! edit_btn('settings.tax.edit', $tax->uuid) !!}
                                   {!! delete_btn('settings.tax.destroy', $tax->uuid) !!}
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