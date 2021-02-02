<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name='David';
        $user->email='email3@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name='Henry';
        $user->email='email2@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name='Yohana';
        $user->email='email1@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();

        $user->roles()->attach(Role::where('name', 'role')->get()->first());
    }
}
