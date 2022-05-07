<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BugDemoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $userOrig = User::factory()->create();
        $accountOrig = Account::factory()->for($userOrig)->create();
        $workoutOrig = Workout::factory()->for($userOrig)->create();

        $workoutsFirst = $accountOrig->workouts()->first();

        $attributes = $workoutsFirst->getAttributes();
        unset($attributes['laravel_through_key']);
        $this->assertEquals($workoutOrig->getAttributes(), $attributes);

        $workoutsFirstOr = $accountOrig->workouts()->firstOr();
        $this->assertEquals($workoutOrig->getAttributes(), $workoutsFirstOr->getAttributes());
    }
}
