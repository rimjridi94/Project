<div class="row">

    <div class="col-md-12">

        <div class="form-group">

            {!! Form::label('name', 'Nom Dépense'.'*') !!}

            {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('vendor', 'Vendeur') !!}

            {!! Form::text('vendor', null, ['class' => 'form-control input-sm']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('expense_date', 'Dépense Date'.' *') !!}

            {!! Form::text('expense_date', null, ['class' => 'form-control datepicker input-sm', 'required']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('category', 'Catégorie') !!}

            {!! Form::text('category', null, ['class' => 'form-control input-sm']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('amount', 'Montant'.' *') !!}

            {!! Form::input('number','amount',null, ['class' => 'form-control input-sm','min'=>'0','step'=>'any', 'required']) !!}

        </div>

        <div hidden class="form-group">
            {!! Form::text('user_uuid', Auth::user()->uuid, ['class' => 'form-control input-sm']) !!}
        </div>

        <div class="form-group">

            {!! Form::label('notes', 'Commentaires') !!}

            {!! Form::textarea('notes',null, ['class' => 'form-control input-sm', 'rows'=> '5']) !!}

        </div>

    </div>

</div>

