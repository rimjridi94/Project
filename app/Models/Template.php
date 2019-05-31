<?php namespace App\Models;

class Template extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected $fillable = ['name', 'subject','body' , 'user_uuid'];

}
