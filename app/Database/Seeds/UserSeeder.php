<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
	public function run()
	{
		$this->db->table('user')->replace($this->generateUsers());
	}

	private function generateUsers(): array
    {
        $faker = Factory::create();
        return [
            'name' => $faker->name(),
            'email' => 'admin@mail.com',
			'password'=> $this->hashPassword('Welcome123'),
        ];
    }

	private function hashPassword(string $plaintextPassword): string
    {
        return password_hash($plaintextPassword, PASSWORD_BCRYPT);
    }
}
