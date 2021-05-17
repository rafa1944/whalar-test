<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of characters.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = collect(Character::pluck('data')->all());

        $toJsonCharacters = $characters->map(function ($item, $key) {
            return json_decode($item);
        });

        return $this->sendResponse('List of all characters', 200, $toJsonCharacters);
    }

    /**
     * Store a newly created character in storage.
     *
     * @param json $character
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = \Validator::make($data, [
            'data' => 'required|json',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        $character = Character::create($data);

        return $this->sendResponse('Created Character successfully', 201);
    }

    /**
     * Display the specified character by name.
     *
     * @param string $name
     *
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $character = Character::select('data')->where([
            ['data->characterName', 'like', $name],
        ])->first();

        if (null === $character) {
            return $this->sendError('Character does not exists.', null, 404);
        }

        return $this->sendResponse('Show a character', 200, json_decode($character->data));
    }

    /**
     * Update the specified character in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TO DO
    }

    /**
     * Remove the specified character from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TO DO
    }

    /**
     * Search for a character from storage.
     *
     * @param string $name
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $name = $request->get('name');

        $characters = Character::select('data')->where([
            ['data->characterName', 'like', $name],
        ])->get();

        $data = collect($characters)->pluck('data');

        $toJson = $data->map(function ($item, $key) {
            return json_decode($item);
        });

        if ($data->isEmpty()) {
            return $this->sendError('Nothing found.', null, 404);
        }

        return $this->sendResponse('Show a character', 200, $toJson);
    }
}
