<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\LoginPage;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'email' => 'dusk@cursosdesarrolloweb.es',
            'is_admin' => true,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
    }

    public function testIsLoginPage()
    {
        $this->browse(function (Browser $browser)
        {
            $browser
                ->visit(new LoginPage)
                ->isLoginPage($browser);
        });
    }

    public function testAdminCanLogin()
    {
        $this->browse(function (Browser $browser)
        {
            $browser
                ->visit(new LoginPage)
                ->loginWithEmailAndPassword($this->user->email, 'password')
                ->assertRouteIs('backoffice.dashboard.index');
        });
    }
}
