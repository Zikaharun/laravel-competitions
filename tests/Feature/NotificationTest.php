<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
//     public function test_admin_can_create_and_users_recive_notifications()
//     {
//         $admin = User::where('role', 'admin')->first();
//         $this->assertNotNull($admin, 'Admin user not found in the database.');
//         $this->actingAs($admin);

//         $response = $this->post(route('admin.notifications.store'), [
//     'title' => 'System Maintenance',
//     'message' => 'The system will be down for maintenance on Saturday at 2 AM.',
//     'url' => 'https://example.com/maintenance-details',
//     'scheduled_at' => now()->addDay()->toDateTimeString(),
//     'channels' => ['email', 'in_app'],
// ]);

//         $response->assertStatus(302); 

//         $this->assertDatabaseHas('notifications', [
//             'title' => 'System Maintenance',
//             'message' => 'The system will be down for maintenance on Saturday at 2 AM.',
//         ]);
//     }

    public function test_user_can_receive_notification()
    {
        $user = User::where('role', 'users')->first();
        $this->assertNotNull($user, 'Regular user not found in the database.');
        $this->actingAs($user);

        $response = $this->get('/users/notifications');
        $response->assertViewIs('users.notifications.index');
        $response->assertStatus(200); 
        $response->assertViewIs('users.notifications.index');
    }
}
