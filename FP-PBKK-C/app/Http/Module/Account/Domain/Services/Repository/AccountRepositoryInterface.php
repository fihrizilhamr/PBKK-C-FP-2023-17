<?php

namespace App\Http\Module\Account\Domain\Services\Repository;

use App\Http\Module\Account\Domain\Model\Account;

interface AccountRepositoryInterface
{
    public function save(Account $account);

}