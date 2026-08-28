<?php

namespace Tests\Feature;

use App\Models\House;
use App\Models\Plot;
use App\Models\User;
use App\Models\Vehicle;
use Database\Seeders\PowerFamilySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PowerFamilyPlatformTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PowerFamilySeeder::class);
    }

    public function test_public_home_page_is_successful(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('POWER FAMILY');
        $response->assertSee('WEKEZA LEO');
        $response->assertSee('JENGA KESHO');
    }

    public function test_plots_catalogue_is_successful(): void
    {
        $response = $this->get('/viwanja');
        $response->assertStatus(200);
        $response->assertSee('Viwanja');
    }

    public function test_plot_detail_page_is_successful(): void
    {
        $plot = Plot::first();
        $this->assertNotNull($plot);

        $response = $this->get('/viwanja/' . $plot->slug);
        $response->assertStatus(200);
        $response->assertSee($plot->title);
        $response->assertSee($plot->plot_reference);
    }

    public function test_houses_catalogue_and_detail_is_successful(): void
    {
        $response = $this->get('/nyumba');
        $response->assertStatus(200);

        $house = House::first();
        $this->assertNotNull($house);

        $detailResponse = $this->get('/nyumba/' . $house->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($house->title);
    }

    public function test_vehicles_catalogue_and_detail_is_successful(): void
    {
        $response = $this->get('/magari');
        $response->assertStatus(200);

        $vehicle = Vehicle::first();
        $this->assertNotNull($vehicle);

        $detailResponse = $this->get('/magari/' . $vehicle->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($vehicle->title);
    }

    public function test_gallery_page_is_successful(): void
    {
        $response = $this->get('/gallery');
        $response->assertStatus(200);
    }

    public function test_static_pages_are_successful(): void
    {
        $this->get('/kuhusu-sisi')->assertStatus(200)->assertSee('Power Family');
        $this->get('/mawasiliano')->assertStatus(200)->assertSee('Mawasiliano');
        $this->get('/privacy-policy')->assertStatus(200);
        $this->get('/terms')->assertStatus(200);
    }

    public function test_language_switch(): void
    {
        $response = $this->get('/lang/sw');
        $response->assertStatus(302);
        $response->assertSessionHas('locale', 'sw');

        $responseEn = $this->get('/lang/en');
        $responseEn->assertStatus(302);
        $responseEn->assertSessionHas('locale', 'en');
    }

    public function test_admin_requires_authentication(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_can_login_and_view_dashboard(): void
    {
        $admin = User::where('email', 'admin@powerfamily.co.tz')->first();
        $this->assertNotNull($admin);

        $response = $this->actingAs($admin)->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Dashibodi');
    }
}
