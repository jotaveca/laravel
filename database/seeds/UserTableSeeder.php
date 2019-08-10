<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User; 
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name' , 'Usuario')->first(); 
        $role_admin = Role::where('name' , 'Comerciante')->first(); 
        
        $user = new User(); 
        $user->name = "Kevin"; 
        $user->username = "kevinjuvenal19"; 
        $user->wallet_qr =  hash('sha256' , 'kevinjuvenal19' ) ;
        $user->email = "kevinjuvenal19@gmail.com";
        $user->confirmation_code = str_random(25);
        $user->password= bcrypt('Kevin1997*K'); 
        $user->confirmed = true; 
        
        $user->save(); 
        
        $user->roles()->attach($role_user); 

    }
}
