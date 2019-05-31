<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstimateSetting extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected $fillable = ['start_number', 'terms', 'logo' , 'user_uuid'];

}
