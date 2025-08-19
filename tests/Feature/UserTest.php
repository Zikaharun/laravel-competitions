<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testAuth()
    {
        $user = new User();
        $user->name = 'Jamaludin El';
        $user->email = 'jamal@localhost';
        $user->password = Hash::make('rahasiaJamal');
        $user->save();

        $success = Auth::attempt(['email' => $user->email, 'password' => 'rahasiaJamal'], true);

        $this->assertTrue($success);
        $user = Auth::user();

        $this->assertNotNull($user);
        $this->assertEquals('jamal@localhost', $user->email);

    }

    public function testAuthasAdmin()
    {
        $user = new User();
        $user->name = 'Admin1';
        $user->email = 'admin@localhost';
        $user->password = Hash::make('rahasiaAdmin');
        $user->role = 'admin';
        $user->save();

        $success = Auth::attempt(['email' => $user->email, 'password' => 'rahasiaAdmin'], true);

        $this->assertTrue($success);
        $user = Auth::user();

        $this->assertNotNull($user);
        $this->assertEquals('admin@localhost', $user->email);

    }
}
