<div class="row">

    <div class="col-md-12">

        <div class="form-group">

            {!! Form::label('name', 'Nom du produit'.'*') !!}

            {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('code', 'Code') !!}

            {!! Form::text('code', null, ['class' => 'form-control input-sm']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('category', 'Catégorie') !!}

            {!! Form::text('category', null, ['class' => 'form-control input-sm']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('price', 'Prix'.' *') !!}

            {!! Form::input('number','price',null, ['class' => 'form-control input-sm', 'min'=>'0','step'=>'any','required']) !!}

        </div>

        <div class="form-group">

            {!! Form::label('description', 'Description'.' *') !!}

            {!! Form::textarea('description',null, ['class' => 'form-control input-sm','required']) !!}

        </div>

    </div>

</div>