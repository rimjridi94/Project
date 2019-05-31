<script type="text/javascript">
    $(function() {
        $('.date').datepicker( {autoclose: true, format: 'dd-mm-yyyy'} );
        $(".date").datepicker("setDate", new Date());
        $('.datatable').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            "bLengthChange": false,
            "bInfo" : false,
            "filter" : true,
            "oLanguage": { "sSearch": ""}
        });
        $('div.dataTables_filter input').addClass('form-control input-sm');
    });
</script>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('client_id', 'Client') !!}
            {!! Form::select('client',$clients,null, ['class' => 'form-control input-sm chosen', 'id' => 'client_id', 'required']) !!}
        </div>
    </div>

    <div class="col-md-3">
        <label>{{ 'De'}} : </label>
        <div class="form-group input-group date">
            <input class="form-control input-sm" size="16" type="text" name="from_date" readonly id="from_date"/>
            <span class="input-group-addon input-sm add-on"><i class="fa fa-calendar" style="display: inline"></i></span>
        </div>
    </div>

    <div class="col-md-3">
        <label>{{ 'à' }} : </label>
        <div class="form-group input-group date" style="margin-left:0;">
            <input class="form-control input-sm" size="16" type="text" name="to_date" readonly id="to_date"/>
            <span class="input-group-addon input-sm add-on"><i class="fa fa-calendar" style="display: inline"></i></span>
        </div>
    </div>
    <div class="col-md-3">
        <label> </label>
        <div class="form-group">
            <a href="javascript: void(0);" onclick="javascript: payments_summary();" class="btn btn-large btn-sm btn-success"  style="margin:6px"><i class="fa fa-check"></i> {{ 'Générer Rapport'}}</a>
        </div>
    </div>

<div class="col-md-12">
    <table class="table datatable dataTable table-bordered">
        <thead>
        <tr class="table_header">
            <th>{{'Date' }} </th>
            <th>{{ 'Numéro de facture' }}</th>
            <th>{{ 'Méthode de Paiement' }}D</th>
            <th>{{ 'Client' }}</th>
            <th class="text-right">{{'Montant' }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->payment_date }}</td>
                <td><a href="{{ route('invoices.show', $payment->invoice_id) }}">{{ $payment->number }}</a></td>
                <td>{{ $payment->method_name }}</td>
                <td><a href="{{ route('clients.show', $payment->client_id) }}">{{ $payment->client_name }}</a></td>
                <td class="text-right">{{ $payment->amount }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>