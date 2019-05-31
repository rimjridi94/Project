<div class="form-group">
    {!! Form::label('username','Nom utilisateur') !!}
    {!! Form::text('username', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Nom') !!}
    {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone', 'Téléphone') !!}
    {!! Form::text('phone', null, ['class' => 'form-control input-sm', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Mot de passe') !!}
    {!! Form::password('password', ['class' => 'form-control input-sm', isset($user) ? '' : 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation','Confirmer Mot de passe') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control input-sm']) !!}
</div>