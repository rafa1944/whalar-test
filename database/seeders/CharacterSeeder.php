<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json_db = file_get_contents(database_path('got-characters2.json'));

        $objs = json_decode($json_db, true);

        foreach ($objs as $obj) {
            foreach ($obj as $key => $value) {
                // var_dump( json_encode($value) );
                // echo "\n\n";

                DB::table('characters')->insert(['data' => json_encode($value)]);
            }
        }
    }
}
