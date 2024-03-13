<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthController extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_register()
    {
        /* $response = $this->get('/');
        $response->assertStatus(200); */
        $user = User::factory()->create();
        
        $register = User::factory()->makeOne([
            'name'     => 'name example',
            'email'    => 'example@prueba.com',
            'password' => '15111'
        ]);
    }
}
