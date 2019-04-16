<?php


use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsertableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','admin@admin.com')->first();


        if(!$user)

        {
          User::create([

           'name'=>'admin',
           'email'=>'admin@admin.com',
           'role'=>'admin',
           'password'=>Hash::make('123456')
          ]);
        } 
    }
}
