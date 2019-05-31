@extends('default')

@section('content')

@if (count($errors) > 0)
{!! form_errors($errors) !!}
@endif
   {!! Form::open(['url' => '/auth/login']) !!}

<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::input('email','email', null, ['class'  =>"form-control", 'required'=>'required', 'placeholder'=>"email"]) !!}
</div>
<div class="form-group">
    {!! Form::label('Password', 'Mot de passe') !!}
    {!! Form::password('password', ['class'=>"form-control", 'placeholder'=>"password", 'required']) !!}
</div>
<div class="form-group">
    {!! Form::Submit('connexion', ['class'=>"btn btn-primary btn-sm form-control"]) !!}
</div>

{!! Form::close() !!}

<div class="form-group">
    <a href="{{ url('password/email') }}" class="pull-right">Mot de passe oublié?</a>
    <div class="clearfix" />
</div>
@endsection
