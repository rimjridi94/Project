<?php namespace App\Models;

class Client extends BaseModel {



    protected $fillable = ['client_no', 'name', 'email', 'address1', 'address2', 'city', 'state', 'postal_code', 'country', 'phone', 'mobile', 'website', 'notes','mat_fisc','reg_commerce','user_uuid'];

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices(){
        return $this->hasMany('App\Models\Invoice');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estimates(){
        return $this->hasMany('App\Models\Estimate');
    }

}
