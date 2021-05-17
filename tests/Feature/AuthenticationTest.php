<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testExample(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testRequiredFieldsForRegistration(): void
    // {
    //     $this->json('POST', 'api/register', ['Accept' => 'application/json'])
    //         ->assertStatus(409)
    //         ->assertJson([
    //             'success' => false,
    //             'message' => 'Error validation',
    //             'data' => [
    //                 'name' => [
    //                     'The name field is required.',
    //                 ],
    //                 'email' => [
    //                     'The email field is required.',
    //                 ],
    //                 'password' => [
    //                     'The password field is required.',
    //                 ],
    //             ],
    //         ])
    //     ;
    // }
}
