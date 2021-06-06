<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    /**
     * @param array $array
     * @return object
     */
    public static function arrayToObject( $array ) {

        foreach( $array as $key => $value ){
            if( is_array( $value ) ) $array[ $key ] = self::arrayToObject( $value );
        }
        return (object) $array;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users =  collect(self::arrayToObject($this->getUsers()));

        $users->map(function ($user){

            DB::table('users')->insert([
                'name' => $user->name,
                'email' => $user->email,
                'password' => bcrypt($user->password),
                'contact' => $user->contact,
                'status' => 1,
                'remember_token' => str_random(80),
                'is_admin' => $user->is_admin,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        });
    }

    public function getUsers()
    {
        return [
            ['name' => 'Harsh', 'password' => 'Harsh@123', 'email' => 'hshah30@gmail.com', 'contact' => '7383181131','is_admin' => '1', 'status' => 1],
            ['name' => 'Kapil', 'password' => 'Kapil@123', 'email' => 'kapil@gmail.com','contact' => '8956859689','is_admin' => '1', 'status' => 1],
            ['name' => 'Maulik', 'password' => 'Maulik@123', 'email' => 'maulik@gmail.com','contact' =>'8978458745','is_admin' => '2', 'status' => 1],
            ['name' => 'Krunal', 'password' => 'Krunal@123', 'email' => 'krunal@gmail.com','contact' =>'8978458721','is_admin' => '2', 'status' => 2],
            ['name' => 'Mansi', 'password' => 'Mansi@123', 'email' => 'mansi@gmail.com','contact' =>'8978458764','is_admin' => '2', 'status' => 2],
            ['name' => 'Trusha', 'password' => 'Trusha@123', 'email' => 'trupti@gmail.com','contact' =>'7896857874','is_admin' => '2', 'status' => 2]
        ];
    }
}
