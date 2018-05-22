<?php

namespace App\Model\Finance;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BankAccounts extends Model
{

    protected $guarded = [];

    public function save(array $options = array())
    {
        if (!$this->account_id) {
            $this->account_id = aid();
        }

        parent::save($options);
    }
}
