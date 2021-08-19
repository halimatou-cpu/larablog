<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModelTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testValidRegistration()
    {
        $faker = Factory::create();
        $email = $faker->unique()->email;
        $count = User::count();

        $response = $this->post('/register', [
            'email' => $email,
            'name' => 'test',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $newCount = User::count();

        //dd($count, $newCount);
        $this->assertNotEquals($count, $newCount);
    }

    public function testInvalidRegistration()
    {
        $response = $this->post('/register', [
            'email' => '',
            'name' => 'test',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        //dd($response->getStatusCode()); //302 : means redirected
        $response->assertSessionHasErrors(); // errors because email's field is required, so test passed
    }
}
