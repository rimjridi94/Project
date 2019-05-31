<?php namespace App\Models;

class InvoiceSetting extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected $fillable = ['start_number', 'terms', 'due_days', 'logo' , 'user_uuid'];
}
