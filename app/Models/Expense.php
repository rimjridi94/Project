<?php namespace App\Models;

class Expense extends BaseModel {

    /**
     * Main table primary key
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @var array
     */

    protected $fillable = ['name', 'vendor','category','amount', 'notes', 'expense_date' , 'user_uuid'];

}
