<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testGuestCannotAccessToDashboard() {
        $this->browse(function (Browser $browser) {
            $browser
                ->visitRoute('backoffice.dashboard.index')
                ->assertRouteIs('login');
        });
    }

    public function testIsDashboardPage() {
        $this->actingAsAdmin(function (Browser $browser, User $user) {
            $browser
                ->visitRoute('backoffice.dashboard.index')
                ->waitForText('Dashboard')
                ->assertSee('Dashboard')
                ->waitForText($user->name)
                ->assertSee($user->name)
                ->waitForText($user->email)
                ->assertSee($user->email)
                ->assertSee('TOTAL USUARIOS')
                ->assertSee('TOTAL CURSOS')
                ->assertSee('TOTAL CATEGORÍAS')
                ->assertSee('TOTAL LECCIONES');
        });
    }
}
