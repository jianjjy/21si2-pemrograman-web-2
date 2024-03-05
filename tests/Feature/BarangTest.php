<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Barang;
use App\Models\User;

class BarangTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_index_barang_but_not_logged_in (): void 
    {
        $response = $this->get('/admin/barang/');
        $response->assertStatus(302);
        $this->assertEquals(route('login'), $response->headers->get('location'));
    }

    public function test_index_barang_after_login (): void 
    {
        //buat user untuk testing
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/admin/barang/');
        $response->assertStatus(200);
        $response->assertSee('New Barang');
    }
}
