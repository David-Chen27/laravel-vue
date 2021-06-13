<?php

namespace Tests\Feature;

use App\Events\Statistics;
use App\Models\Community;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redis;
use Tests\TestCase;

class StatisticsTest extends TestCase
{
    use RefreshDatabase;

    public function test_evenet_community_count_plus()
    {
        User::factory(1)->create();
        Community::factory(1)->create();

        \event(new Statistics(
            Community::findOrFail(1),
            ['count'])
        );

        $this->assertDatabaseHas('communities', ['id' => 1, 'count' => 1]);
    }


    public function test_evenet_community_count_plus_too_many_attempts()
    {
        $this->actingAs(User::factory()->create());
        $community = Community::factory()->create();

        tap($this->post('/community', ['id' => $community->id, 'type' => 'count']), function ($response){
            $response->assertStatus(201);
        });

        tap($this->post('/community', ['id' => $community->id, 'type' => 'count']), function ($response){
            $response->assertStatus(429);
        });

        $this->assertDatabaseHas($community, ['id' => $community->id, 'count' => 1]);
    }

    public function test_evenet_community_count_plus_empty_id()
    {
        $this->actingAs(User::factory()->create());
        Community::factory()->create();

        tap($this->post('/community', ['id' => 0, 'type' => 'count']), function ($response){
            $response->assertStatus(404);
        });
    }
}
