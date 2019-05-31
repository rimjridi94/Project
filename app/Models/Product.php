<?php namespace App\Models;

class Product extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected $fillable =  ['name', 'code', 'category', 'price', 'description','stock','quantity' , 'user_uuid'];

}
