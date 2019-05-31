<?php namespace App\Models;


class EstimateItem extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected  $fillable = ['estimate_id', 'item_name', 'item_description', 'quantity',  'price', 'tax_id','nb_jours' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tax(){
        return $this->belongsTo('App\Models\TaxSetting');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function Estimate(){
        return $this->belongsTo('App\Models\Estimate');
    }
}
