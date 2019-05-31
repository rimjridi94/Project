@extends('app')

@section('content')

<div class="col-md-12 content-header" >
    <h1><i class="fa fa-envelope"></i> {{ ' Email Theme' }}</h1>
</div>

<section class="content">
    <div class="row">
        <div class="col-md-3">
            @include('settings.partials._menu')
        </div>

        <div class="col-md-9">
            <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-10">
                    @if (count($errors) > 0)
                    {!! form_errors($errors) !!}
                    @endif

                    @if($template)
                    {!! Form::model($template, ['route' => ['settings.templates.update', $template->uuid], 'method'=>'PATCH', 'files'=>true]) !!}
                    @else
                    {!! Form::open(['route' => ['settings.templates.store'], 'files'=>true]) !!}
                    @endif

                    <div class="form-group">
                        {!! Form::label('name', 'Template') !!}
                        {!! Form::select('name', array('invoice' => 'Invoice Template',
                        'estimate' => 'Estimate Template'),
                        $select, ['class' => 'form-control chosen  input-sm', 'id'=>'template_select']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('subject',  'Objet') !!}
                        {!! Form::text('subject', null, ['class' => 'form-control  input-sm']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('body','Email Body') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control  input-sm', 'id'=>'email_template', 'rows' => '20']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Enregistrer',['class' => 'btn btn-sm btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

                <div class="col-md-2 tags">

                    <label><b>{{ 'Invoice Tags'}}</b></label><br>

                    {invoice_number}<br>

                    {invoice_amount}<br>

                    {invoice_logo}<br><br>

                    <label><b>{{'Client Tags'}}</b></label><br>

                    {client_name}<br>

                    {client_email}<br>

                    {client_number}<br><br>

                   <label><b>{{'company_tags'}}</b></label><br>

                    {company_name}<br>

                    {company_email}<br>

                    {company_website}<br>

                    {contact_person}<br><br>

                    <label><b>{{'Users Tags'}}</b></label><br>

                    {username}<br>

                    {password}<br>

                    {login_link}<br>
                </div>
                <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $('#email_template').wysihtml5({image:false,link:false});
</script>
@endsection