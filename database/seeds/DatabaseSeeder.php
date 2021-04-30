<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\State::class,1)->create();
	    App\State::create([
	    	'name' => 'Desactivado'
	    ]);
	    
	    factory(App\Company::class,1)->create();

	    factory(App\Role::class,1)->create();
	    App\Role::create([
	    	'name' => 'Admin',
	    	'description' => 'Usuario administrador',
	    	'permission' => 'Limited',
	    ]);


	    App\User::create([
				'idNumber' => '1022399551',
				'name' => 'Sebastián',
				'lastname' => 'Chaparro',
				'phone' => '3168642973',
				'company' => '1',
				'role' => '1',
				'state' => '1',
				'email' => 'admin@admin.com',
				'password' => bcrypt('admin'),
	    ]);
	  
	    factory(App\Service::class,10);
    }

}
