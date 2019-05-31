<?php namespace App\Models;

class Currency extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected $fillable = ['name', 'symbol', 'selected'];

}
