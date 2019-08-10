<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role(); 
        $role->name = "Usuario"; 
        $role->save(); 
        
        $role = new Role();
        $role->name = "Comerciante"; 
        $role->save(); 
        
    }
}
