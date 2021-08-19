<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test that admin's routes access denied to guest and redirect to login 
     *
     * @return void
     */
    public function testAccessAdminWithGuestRole()
    {
        $response = $this->get('/admin/articles');

        $response->assertRedirect('/login');
    }

    public function testAccessAdminWithAdminRole()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => "admin@admin.com",
            'password' => Hash::make('adminpassword'),
            'role' => User::ADMIN_ROLE,
        ]);
        $this->actingAs($admin); 
        $response = $this->get('/admin/articles');
        $response->assertStatus(200);
    }
}
