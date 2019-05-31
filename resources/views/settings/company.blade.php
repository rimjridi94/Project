@extends('app')

@section('content')
<div class="col-md-12 content-header" >
    <h1><i class="fa fa-cogs"></i> {{'Config Systeme'}}</h1>
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
                {!! Form::model($setting, ['route' => ['settings.company.update', $setting->uuid], 'method'=>'PATCH', 'files'=>true]) !!}
             @else
                {!! Form::open(['route' => ['settings.company.store'], 'files'=>true]) !!}
            @endif
            <div class="form-group">
                {!! Form::label('name','Nom') !!}
                {!! Form::text('name', null, ['class' => "form-control input-sm", 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('contact', 'Contacter personne') !!}
                {!! Form::text('contact', null, ['class' => "form-control input-sm"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email','Email') !!}
                {!! Form::input('email', 'email', null, ['class' => "form-control input-sm", 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone', 'Téléphone') !!}
                {!! Form::text('phone', null, ['class' => "form-control input-sm", 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('address1', 'Adresse 1') !!}
                {!! Form::text('address1', null, ['class' => "form-control input-sm", 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('address2', 'Adresse 2') !!}
                {!! Form::text('address2', null, ['class' => "form-control input-sm"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('city', 'Ville') !!}
                {!! Form::text('city', null, ['class' => "form-control input-sm", 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('state', 'Province') !!}
                {!! Form::text('state', null, ['class' => "form-control input-sm", 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('postal_code',  'Code postale') !!}
                {!! Form::text('postal_code', null, ['class' => "form-control input-sm"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('country', 'Pays') !!}
                {!! Form::text('country', null, ['class' => "form-control input-sm", 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('vat', 'M.F') !!}
                {!! Form::text('vat', null, ['class' => "form-control input-sm"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('website', 'Site web') !!}
                {!! Form::text('website', null, ['class' => "form-control input-sm"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('RG', 'Registre de commerce') !!}
                {!! Form::text('RG', null, ['class' => "form-control input-sm"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('RIB', 'RIB') !!}
                {!! Form::text('RIB', null, ['class' => "form-control input-sm"]) !!}
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

            <div class="form-group">
                {!! Form::label('favicon', 'Logo'.'(16x16)') !!}
                @if($setting && $setting->favicon != '')
                {!! HTML::image(asset('assets/img/'.$setting->favicon), 'favicon', array('class' => 'thumbnail')) !!}
                @endif
                <div class=" form-group input-group input-file" style="margin-bottom: 10px;width:50%">
                    <div class="form-control  input-sm"></div>
                      <span class="input-group-addon">
                        <a class='btn btn-sm btn-primary' href='javascript:;'>
                            {{ 'Chercher' }}
                            <input type="file" name="favicon" id="favicon" onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val());">
                        </a>
                      </span>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('date_format', 'Format Date') !!}
                {!! Form::select('date_format', array('d/m/Y' => date('d/m/Y'),
                    'm/d/Y' => date('m/d/Y'),
                    'Y/m/d' => date('Y/m/d'),
                    'F j, Y' => date('F j, Y'),
                    'm.d.y' => date('m.d.Y'),
                    'd-m-Y' => date('d-m-Y'),
                    'D M j Y' => date('D M j Y')),null, ['class' => "form-control input-sm"]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Enregistrer Configs', ['class' => "btn btn-primary btn-sm"]) !!}
            </div>
            {!! Form::close() !!}
            </div>
            </div>
        </div>
    </div>
</section>

@endsection