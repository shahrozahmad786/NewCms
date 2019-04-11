<?php


use Illuminate\Database\Seeder;
use App\User;
class UsertableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = 'admin';
        $user1->email = 'admin@admin.com';
   
        $user1->password = bcrypt('123456');
      
        $user1->save();
    }
}
