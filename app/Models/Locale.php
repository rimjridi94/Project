<?php namespace App\Models;

class Locale extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected $fillable = ['locale_name', 'short_name', 'flag', 'status'];

}
