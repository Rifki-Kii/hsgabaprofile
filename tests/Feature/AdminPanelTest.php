<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Setting;
use App\Models\HeroSlide;
use App\Models\Program;
use App\Models\Facility;
use App\Models\GalleryItem;
use App\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Seed default database parameters
        $this->seed();
    }

    /** @test */
    public function homepage_loads_dynamic_content()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Homeschooling Group Abdurrahman Bin Auf');
        $response->assertSee('Siroh');
        $response->assertSee('Gedung HSG ABA');
        $response->assertSee('Festival Budaya');
    }

    /** @test */
    public function guest_cannot_access_admin_dashboard()
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function admin_can_login_with_valid_credentials()
    {
        Livewire::test('admin.login')
            ->set('email', 'admin@hsgaba.com')
            ->set('password', 'password123')
            ->call('login')
            ->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticated();
    }

    /** @test */
    public function admin_cannot_login_with_invalid_credentials()
    {
        Livewire::test('admin.login')
            ->set('email', 'admin@hsgaba.com')
            ->set('password', 'wrongpassword')
            ->call('login')
            ->assertHasErrors(['email']);

        $this->assertGuest();
    }

    /** @test */
    public function authenticated_admin_can_access_dashboard()
    {
        $user = User::first();
        $response = $this->actingAs($user)->get(route('admin.dashboard'));
        $response->assertStatus(200);
        $response->assertSee('Dashboard');
    }

    /** @test */
    public function admin_can_update_settings()
    {
        $user = User::first();
        $this->actingAs($user);

        Livewire::test('admin.setting-manager')
            ->set('site_name', 'HSG ABA Updated')
            ->set('whatsapp_number', '628111222333')
            ->set('address', 'Alamat Baru')
            ->set('operational_mon_fri', '09:00 - 15:00')
            ->set('operational_sat', '09:00 - 11:00')
            ->set('operational_sun', 'Libur')
            ->set('profile_title', 'Judul Profil Baru')
            ->set('profile_description_1', 'Keterangan 1 Baru')
            ->set('profile_description_2', 'Keterangan 2 Baru')
            ->set('profile_feature_1', 'Fitur 1 Baru')
            ->set('profile_feature_2', 'Fitur 2 Baru')
            ->set('profile_feature_3', 'Fitur 3 Baru')
            ->set('profile_feature_4', 'Fitur 4 Baru')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('settings', [
            'site_name' => 'HSG ABA Updated',
            'whatsapp_number' => '628111222333',
            'address' => 'Alamat Baru',
            'profile_title' => 'Judul Profil Baru',
            'profile_description_1' => 'Keterangan 1 Baru',
            'profile_description_2' => 'Keterangan 2 Baru',
            'profile_feature_1' => 'Fitur 1 Baru',
            'profile_feature_2' => 'Fitur 2 Baru',
            'profile_feature_3' => 'Fitur 3 Baru',
            'profile_feature_4' => 'Fitur 4 Baru',
        ]);

        // Verify that homepage shows updated values
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Judul Profil Baru');
        $response->assertSee('Keterangan 1 Baru');
        $response->assertSee('Keterangan 2 Baru');
        $response->assertSee('Fitur 1 Baru');
    }

    /** @test */
    public function admin_can_manage_heroes()
    {
        $user = User::first();
        $this->actingAs($user);

        // Verify list has seeded slides
        $this->assertEquals(4, HeroSlide::count());

        // Test delete slide
        $slideId = HeroSlide::first()->id;
        Livewire::test('admin.hero-manager')
            ->call('delete', $slideId)
            ->assertHasNoErrors();

        $this->assertEquals(3, HeroSlide::count());
        $this->assertDatabaseMissing('hero_slides', ['id' => $slideId]);
    }

    /** @test */
    public function admin_can_manage_programs()
    {
        $user = User::first();
        $this->actingAs($user);

        // Test create program without image (should use fallback/placeholder)
        Livewire::test('admin.program-manager')
            ->set('title', 'Program Baru')
            ->set('description', 'Deskripsi Program Baru')
            ->set('icon', '🎓')
            ->set('badge_color', 'blue')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('programs', [
            'title' => 'Program Baru',
            'description' => 'Deskripsi Program Baru',
        ]);

        // Test update program
        $program = Program::where('title', 'Program Baru')->first();
        Livewire::test('admin.program-manager')
            ->call('edit', $program->id)
            ->set('title', 'Program Baru Diedit')
            ->call('update')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('programs', [
            'id' => $program->id,
            'title' => 'Program Baru Diedit',
        ]);
    }

    /** @test */
    public function admin_can_manage_facilities()
    {
        $user = User::first();
        $this->actingAs($user);

        // Test list
        $this->assertEquals(7, Facility::count());

        // Test update facility
        $facility = Facility::first();
        Livewire::test('admin.facility-manager')
            ->call('edit', $facility->id)
            ->set('title', 'Fasilitas Diedit')
            ->call('update')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('facilities', [
            'id' => $facility->id,
            'title' => 'Fasilitas Diedit',
        ]);
    }
}
