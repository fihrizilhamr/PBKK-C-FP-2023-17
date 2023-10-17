<?php

namespace App\Http\Module\Account\Infrastructure\Repository;

use App\Http\Module\Account\Domain\Model\Account;
use App\Http\Module\Account\Domain\Services\Repository\AccountRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AccountRepository implements AccountRepositoryInterface
{
    public function save(Account $account)
    {
        DB::table('products')->upsert(
            [
                'nama' => $product->nama,
                'price' => $product->price,
                'description' => $product->description,
            ],'nama'
        );
    }
}