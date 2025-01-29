<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class LoginPage extends Page
{
    /**
     * Get the URL for the page.
     */
    public function url(): string
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     */
    public function assert(Browser $browser): void
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array<string, string>
     */
    public function elements(): array
    {
        return [
            '@email' => 'input[name="email"]',
            '@password' => 'input[name="password"]',
            '@submit' => 'button[type="submit"]',
        ];
    }

    public function isLoginPage(Browser $browser): void
    {
        $browser
            ->visit($this->url())
            ->assertSee('Email')
            ->assertSee('Password')
            ->assertSee('Remember me')
            ->assertSee('Forgot your password?')
            ->assertSee('LOG IN');
    }

    public function loginWithEmailAndPassword(Browser $browser, string $email, string $password): void
    {
        $browser
            ->visit($this->url())
            ->type('@email', $email)
            ->type('@password', $password)
            ->press('@submit');
    }
}
