<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSetting extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected  $fillable = ['protocol', 'smtp_host', 'smtp_username',  'smtp_password', 'smtp_port','user_uuid'];

}
