<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bank;

class CompaniesBanks extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies_banks';

    public function bank()
    {
    	$bank = Bank::findOrFail($this->bank_id);
        return $bank->name;
    }
}
