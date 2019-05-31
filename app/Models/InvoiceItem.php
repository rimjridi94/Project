<?php namespace App\Models;

class InvoiceItem extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected  $fillable = ['invoice_id', 'item_name','item_description', 'quantity',  'price', 'tax_id','nb_jours' ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tax(){
        return $this->belongsTo('App\Models\TaxSetting');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function invoice(){
        return $this->belongsTo('App\Models\Invoice');
    }

}
