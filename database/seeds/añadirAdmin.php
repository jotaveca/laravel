<?php

use Illuminate\Database\Seeder;

class añadirAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('admin')->insert(array(
           'name_c' => 'Juan Cisneros',
           'contact_s'=> '0212',
           'phone_s' => '0412',
           'email'=> 'admin@sites.com',
           'img_perf'=> 'admin@sites.com',
           'password' => '$2y$10$SO3FL0lH7JiWMZZYVnh9RONJJikfws8ATIMygDGqWWW9yycofT65K',
           'priority'  => 1 ,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s'),
           
    ));
    }
}
