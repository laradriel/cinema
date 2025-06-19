<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_can_be_created(): void
    {
        $user = \App\Models\User::factory()->create();

        $this->assertNotNull($user);
        $this->assertIsInt($user->id);
        $this->assertNotEmpty($user->name);
        $this->assertNotEmpty($user->email);
        $this->assertNotEmpty($user->password);
        $this->assertFalse($user->is_admin); // Default value is false unless specified
    }
}
