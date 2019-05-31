<?php namespace App\Models;

class Payment extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected $fillable = ['invoice_id','payment_date','amount','notes','method' , 'user_uuid'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function invoice(){
        return $this->belongsTo('App\Models\Invoice');
    }

    public function payment_method(){
        return $this->belongsTo('App\Models\PaymentMethod');
    }


}
