<?php namespace App\Models;

class Estimate extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected  $fillable = ['client_id', 'estimate_no', 'estimate_date',  'currency', 'notes', 'terms' , 'user_uuid' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function items(){
        return $this->hasMany('App\Models\EstimateItem');
    }

}
