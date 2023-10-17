<?php

namespace App\Http\Module\Account\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account
{
    /**
     * @param string $nama
     * @param float $price
     * @param string $description
     */
    public function __construct(
        public string $Email,
        public string $Password,
        public string $Nama,
        public string $TL,
        public string $Alamat,
        public string $NHP,
        public string $Gender
    )
    {
    }
}