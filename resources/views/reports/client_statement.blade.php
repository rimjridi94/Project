<div class="col-md-3">
    <div class="form-group">
        <div class="form-group">
            {!! Form::label('client_id', 'Client') !!}
            {!! Form::select('client',$clients,null, ['class' => 'form-control input-sm chosen', 'id' => 'client_id', 'required']) !!}
        </div>
    </div>
</div>

<div class="col-md-3">
    <label> </label>
    <div class="form-group input-group" style="margin-left:0;">
        <a href="javascript: void(0);" onclick="javascript: client_statement();" class="btn btn-sm btn-success pull-right"  style="margin:6px">
            <i class="fa fa-check"></i> {{'Générer attestation'}}
        </a>
    </div>
</div>

<?php if(isset($stats)){ ?>
<div class="row">
    <div class="col-lg-5">
        <table class="table table-bordered tablesorter">
            <thead>
                <tr class="table_header">
                    <th>{{'Balance Client en cours'}}</th>
                </tr>
            </thead>
            <tbody>
            <tr><td class="statistics_cell">
                    <?php $bal_class = ($stats['pending_balance'] > 0) ? 'pending_bal' : 'over_paid'; ?>
                    <span class="<?php echo $bal_class; ?>"><?php echo format_amount($stats['pending_balance']); ?></span>
                </td></tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-5 pull-right">
        <table class="table  table-bordered ">
            <thead>
                <tr class="table_header">
                    <th colspan="2">{{'Statistiques Client'}}</th>
                </tr>
            </thead>
            <tbody>
            <tr class="transaction-row">
                <td width="50%">{{'Montant Totale Facturé'}} </td>
                <td><?php echo (isset($stats)) ? format_amount($stats['total_invoiced']) : ''; ?></td>
            </tr>
            <tr class="transaction-row">
                <td>{{'Montant Totale Payé'}}</td>
                <td><?php echo (isset($stats)) ? format_amount($stats['total_received']) : ''; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php } ?>

<div class="col-md-12">
    <table class="table table-hover table-striped table-bordered datatable">
        <thead>
        <tr class="table_header">
            <th>{{'Date'}} </th>
            <th>{{'Activité'}}</th>
            <th class="text-right">{{ 'Factures'}}</th>
            <th class="text-right">{{'Paiments'}}</th>
            <th class="text-right">{{'Balance'}}</th>
        </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @foreach($statement as $record)
                <?php $total = ($record['transaction_type'] == 'payment') ? $total - $record['amount'] : $total + $record['amount']; ?>
                <tr>
                    <td>{{ $record['date'] }}</td>
                    <td>{{ $record['activity'] }}</td>
                    <td class="text-right text-red text-bold">{{ $record['transaction_type'] != 'payment' ? $record['amount'] : '' }}</td>
                    <td class="text-right text-bold text-green">{{ $record['transaction_type'] == 'payment' ? $record['amount'] : '' }}</td>
                    <td class="text-right">{{ $total }}</td>
                </tr>
            @endforeach
            <tr>
                <td class="text-bold">{{ 'Total'}}</td>
                <td class="text-right text-bold text-red" colspan="4">{{ $total }}</td>
            </tr>
        </tbody>
    </table>
</div>
