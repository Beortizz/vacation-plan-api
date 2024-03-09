<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\HolidayPlan;

class HolidayPlanControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */


    public function test_index(): void
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get('/api/holiday-plans');

        $response->assertStatus(200);
    }

    public function test_store(): void
    {
        $user = User::factory()->make();

        $this->actingAs($user);

        $response = $this->post('/api/holiday-plans', [
            'title' => 'Test Holiday Plan',
            'description' => 'Test Description',
            'date' => '2021-12-25',
            'location' => 'Test Location',
            'participants' => $user->pluck('id')->toArray(),
        ]);

        $response->assertStatus(201);
    }

    public function test_show(): void
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        $holidayPlans = HolidayPlan::all();
        $this->assertNotEmpty($holidayPlans, 'No holiday plans found in the database');

        $randomHolidayPlan = $holidayPlans->random();
        $response = $this->get('/api/holiday-plans/' . $randomHolidayPlan->id);

        $response->assertStatus(200);
    }

    public function test_update(): void
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        $holidayPlans = HolidayPlan::all();
        $this->assertNotEmpty($holidayPlans, 'No holiday plans found in the database');

        $randomHolidayPlan = $holidayPlans->random();
        $response = $this->put('/api/holiday-plans/' . $randomHolidayPlan->id, [
            'title' => 'Updated Test Holiday Plan',
            'description' => 'Updated Test Description',
            'date' => '2021-12-25',
            'location' => 'Updated Test Location',
            'participants' => [],
        ]);

        $response->assertStatus(200);
    }

    public function test_destroy(): void
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        $holidayPlans = HolidayPlan::all();
        $this->assertNotEmpty($holidayPlans, 'No holiday plans found in the database');

        $randomHolidayPlan = $holidayPlans->random();
        $response = $this->delete('/api/holiday-plans/' . $randomHolidayPlan->id);

        $response->assertStatus(200);
    }

    public function test_generate_pdf(): void
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        $holidayPlans = HolidayPlan::all();
        $this->assertNotEmpty($holidayPlans, 'No holiday plans found in the database');

        $randomHolidayPlan = $holidayPlans->random();
        $response = $this->get('/api/holiday-plans/generate-pdf/' . $randomHolidayPlan->id);

        $response->assertStatus(200);
    }
}
