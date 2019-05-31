@extends('app')
@section('content')
<div class="col-md-12 content-header" >
    <h1><i class="fa fa-file-pdf-o"></i> {{'Configs des Factures'}}</h1>
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
                        {!! Form::model($setting, ['route' => ['settings.invoice.update', $setting->uuid], 'method'=>'PATCH', 'files'=>true]) !!}
                        @else
                        {!! Form::open(['route' => ['settings.invoice.store'], 'files'=>true]) !!}
                    @endif

                    <div class="form-group">
                        {!! Form::label('start_number', 'Num Facture commence') !!}
                        {!! Form::text('start_number', $setting ? $setting->start_number : '', ['class' => "form-control input-sm"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('terms', 'Invoice Terms') !!}
                        {!! Form::textarea('terms', null, ['class' => "form-control input-sm", 'id'=>'invoice_terms']) !!}
                    </div>

                    <div class="form-group">
                {!! Form::label('logo', 'Logo'.'('.'Taille'.': 200)') !!}
                        @if($setting && $setting->logo != '')
                        {!! HTML::image(asset('assets/img/'.$setting->logo), 'logo', array('class' => 'thumbnail')) !!}
                        @endif
                        <div class=" form-group input-group input-file" style="margin-bottom: 10px;width:50%">
                            <div class="form-control input-sm"></div>
                              <span class="input-group-addon">
                                <a class='btn btn-sm btn-primary' href='javascript:;'>
                                    {{ 'Chercher'}}
                                    <input type="file" name="logo" id="logo" onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val());">
                                </a>
                              </span>
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('due_days', 'Due Date') !!}
                        <div class="input-group  col-md-2">
                        {!! Form::input('number','due_days', null, ['class' => "form-control input-sm", 'min'=>'0']) !!}
                            <span class="input-group-btn ">
                                <button class="btn btn-sm btn-default">{{'Jours'}}</button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                    {!! Form::submit('Enregistrer Configs', ['class="btn btn-primary btn-sm"']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div>

</section>

@endsection

@section('scripts')

<script>

    $('#invoice_terms').wysihtml5({image:false,link:false});

</script>

@endsection