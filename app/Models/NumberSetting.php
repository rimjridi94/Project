<?php namespace App\Models;

class NumberSetting extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected $fillable = ['invoice_number','client_number','estimate_number' , 'user_uuid'];

}
