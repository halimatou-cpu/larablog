<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RouteTest extends TestCase
{
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
        $id = User::where('role','ADMIN')->firstOrFail()->id;
        $admin = Auth::loginUsingId($id);
        $this->actingAs($admin); // signifie que c'est le $admin qui fait le get à cette url
        //dd($admin);
        $response = $this->get('/admin/articles');
        //dd($response);
        //dd($response->getStatusCode());
        $response->assertStatus(200);
    }
    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
