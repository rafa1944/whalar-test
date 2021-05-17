<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class SearchTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanPerformASearch(): void
    {
        // DB seed
        $this->seed();

        // Get an API token to perform the search
        Sanctum::actingAs(
            User::create([
                'name' => 'Rafa',
                'email' => 'rafa@gmail.com',
                'password' => 'password',
            ])
        );

        $response = $this->postJson('api/characters/search', ['name' => 'Addam Marbrand']);

        $response->assertStatus(200);
    }
}
