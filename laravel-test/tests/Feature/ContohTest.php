<?php

namespace Tests\Feature;

use App\Http\Controllers\ContohController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContohTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = new ContohController();
        $fungsi = $user->testUnitTesting();
        dd($fungsi->getData());
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
