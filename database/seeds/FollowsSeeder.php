<?php

use Illuminate\Database\Seeder;

class Follows extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $follows = [
    'id' => 1,
    'following_id' => 1,
    'followed_id ' => 1,
];
DB::table('followsSeeder')->insert($follows);
}

}
