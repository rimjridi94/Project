<?php namespace App\Models;

class PaymentMethod extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected  $fillable = ['name','selected','user_uuid'];

}
