<?php

namespace App\Http\Module\Product\Application\Services\CreateAccount;

class CreateUserRequest
{
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