<?php

namespace Tests\Unit;

use App\Models\Plan;
use App\Models\Server;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $plan = Plan::factory()->create();
        $server = Server::factory()->create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
        ]);

        $this->assertInstanceOf(User::class, $server->user);
        $this->assertEquals($user->id, $server->user->id);
    }

    /** @test */
    public function it_belongs_to_a_plan()
    {
        $user = User::factory()->create();
        $plan = Plan::factory()->create();
        $server = Server::factory()->create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
        ]);

        $this->assertInstanceOf(Plan::class, $server->plan);
        $this->assertEquals($plan->id, $server->plan->id);
    }
}
