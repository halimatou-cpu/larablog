<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function testValidRegistration()
    {

        $count = User::count();

        $response = $this->post('/register', [
            'email' => 'halima@bah.com',
            'name' => 'test',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $newCount = User::count();
    
        $this->assertNotEquals($count,$newCount);
    }
}
