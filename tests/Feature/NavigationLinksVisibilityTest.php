<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\{Category, Subcategory};
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class NavigationLinksVisibilityTest extends TestCase
{

    use RefreshDatabase;

    public function testGuestUserNavigationLinks()
    {
        $response = $this->get('/');

        $response->assertSee('Iniciar sesión');
        $response->assertSee('Registrarse');
        $response->assertDontSee('Perfil');
        $response->assertDontSee('Finalizar sesión');
    }

    public function testAuthenticatedUserNavigationLinks()
    {

        $user = User::factory()->create();

        if ($user instanceof Authenticatable) {
            $response = $this->actingAs($user)->get('/');

            $response->assertSee('Perfil');
            $response->assertSee('Finalizar sesión');
            $response->assertDontSee('Iniciar sesión');
            $response->assertDontSee('Registrarse');
        }
    }
}
