<?php

namespace App\Http\Module\Account\Application\Services\CreateAccount;

use App\Http\Module\Account\Domain\Model\Account;
use App\Http\Module\Account\Infrastructure\Repository\AccountRepository;

class CreateAccountService
{

    public function __construct(
        private AccountRepository $account_repository
    )
    {
    }

    public function execute(CreateAccountRequest $request){
        $account = new Account(
            $request->Email,
            $request->Password,
            $request->Nama,
            $request->TL,
            $request->Alamat,
            $request->NHP,
            $request->Gender
        );

        $this->account_repository->save($account);
    }
}