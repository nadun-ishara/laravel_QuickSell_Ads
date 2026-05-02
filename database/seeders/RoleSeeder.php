<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'Moderator',
                'slug' => 'moderator',
            ],
            [
                'id' => 3,
                'name' => 'User',
                'slug' => 'user',
            ],
        ]);

        foreach($roles as $role){
            Role::updateOrCreate(
                ['id' =>$role['id']],
                [
                    'name' =>$role['name'],
                    'slug' =>$role['slug']
                ]
            );
        }
    }
}
