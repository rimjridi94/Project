<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('client_no', 'Numéro de client'.'*') !!}
            {!! Form::text('client_no', isset($client_num) ? $client_num : null, ['class' => 'form-control input-sm', 'required']) !!}
        </div>

              <div class="form-group">
            {!! Form::label('reg_commerce', 'Registre de Commerce') !!}
            {!! Form::text('reg_commerce', null, ['class' => 'form-control input-sm']) !!}
        </div>

              <div class="form-group">
            {!! Form::label('mat_fisc', 'Matricule fiscale') !!}
            {!! Form::text('mat_fisc', null, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name', 'nom du client'.'*') !!}
            {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email'.' *') !!}
            {!! Form::text('email', null, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Téléphone') !!}
            {!! Form::text('phone', null, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mobile', 'Mobile') !!}
            {!! Form::text('mobile', null, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address1', 'Addresse 1') !!}
            {!! Form::text('address1', null, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address2', 'Adresse de livraison') !!}
            {!! Form::text('address2', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('state', 'Région') !!}
            {!! Form::text('state', null, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'Ville') !!}
            {!! Form::text('city', null, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('postal_code', 'Postal Code') !!}
            {!! Form::text('postal_code', null, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('country', 'Pays') !!}
            {!! Form::text('country', null, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('website', 'Site web') !!}
            {!! Form::text('website', null, ['class' => 'form-control input-sm']) !!}
        </div>
        <div hidden class="form-group">
            {!! Form::text('user_uuid', Auth::user()->uuid, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('notes', 'Commentaires') !!}
            {!! Form::textarea('notes', null, ['class' => 'form-control input-sm', 'rows' => '5']) !!}
        </div>
    </div>
</div>