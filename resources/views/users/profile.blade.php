@extends('app')

@section('content')

<div class="col-md-12 content-header" >

    <h1><i class="fa fa-file"></i> {{'Modifier Profile'}}</h1>

</div>

<section class="content">

    <div class="row">

        <div class="col-md-12">

        <div class="box box-primary">

            <div class="box-body">

        {!! Form::open(['url' => ['profile'], 'files'=>true]) !!}

        <div class="col-md-6">

                    @if (count($errors) > 0)

                        {!! form_errors($errors) !!}

                    @endif

                  <div class="form-group">

                        {!! Form::label('username', 'Nom dʼutilisateur') !!}

                        {!! Form::text('username', $user->username, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('name',  'Nom') !!}

                        {!! Form::text('name', $user->name, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('email',  'Adresse mail') !!}

                        {!! Form::input('email','email', $user->email, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('phone', 'Téléphone') !!}

                        {!! Form::text('phone', $user->phone, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('password', 'Mot de passe '.' (Laisser vide si pas de changement)') !!}

                        {!! Form::password('password', ['class' => 'form-control input-sm']) !!}

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-sm btn-success">

                            <i class=" fa fa-refresh "></i>

                            {{'Mettre a jour Profile'}}

                        </button>

                    </div>

             </div>

        <div class="col-md-6">

            <div class="form-group">

                <label for="photo">Profile Photo</label>

                {!! HTML::image(asset($user->photo != '' ? 'assets/img/uploads/'.$user->photo : 'assets/img/uploads/no-image.jpg'), 'photo', array('class' => 'thumbnail')) !!}<br>

                <div class=" form-group input-group input-file" style="margin-bottom: 10px;width:50%">
                    <div class="form-control input-sm"></div>
                      <span class="input-group-addon">
                        <a class='btn btn-sm btn-primary' href='javascript:;'>
                            {{  'Chercher'}}
                            <input type="file" name="photo" id="photo" onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val());">
                        </a>
                      </span>
                </div>

            </div>

       </div>

        {!! Form::close() !!}

                </div>

            <div class="clearfix"></div>

            </div>

        </div>

        </div>

</section>

@endsection