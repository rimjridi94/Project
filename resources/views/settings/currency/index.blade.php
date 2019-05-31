@extends('app')

@section('content')
<div class="col-md-12 content-header" >
    <h1><i class="fa fa-usd"></i> {{'Devis '}}</h1>
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
                    {!! Form::open(['route' => ['settings.currency.store']]) !!}

                    <div class="form-group">
                        {!! Form::label('name', trans('application.name')) !!}
                        <div class="input-group col-md-4">
                            {!! Form::text('name', null, ['class' => "form-control input-sm", 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('symbol', trans('application.symbol')) !!}
                        <div class="input-group col-md-4">
                            {!! Form::text('symbol', null, ['class' => "form-control input-sm", 'required']) !!}
                        </div>

                    </div>

                    <div class="form-group">
                        {!! Form::submit(trans('application.save'), ['class="btn btn-sm btn-primary"']) !!}
                    </div>
                    {!! Form::close() !!}



                    <table class="table table-striped table-bordered datatable">
                        <thead>
                        <tr>
                            <th></th>
                            <th>{{trans('application.name')}}</th>
                            <th>{{trans('application.symbol')}}</th>
                            <th>{{trans('application.default')}}</th>
                            <th>{{trans('application.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($currencies->count() > 0)
                        @foreach($currencies as $currency)
                        <tr>
                            <td></td>
                            <td>{{ $currency->name }}</td>
                            <td>{{ $currency->symbol }}</td>
                            <td>{!! $currency->selected  ? '<span class="label label-success">'.trans('application.yes').'</span>' : '<span class="label label-danger">'.trans('application.no').'</span>' !!}</td>
                            <td>
                                {!! edit_btn('settings.currency.edit', $currency->uuid) !!}
                                {!! delete_btn('settings.currency.destroy', $currency->uuid) !!}
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