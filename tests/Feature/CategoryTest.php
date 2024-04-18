<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        Sanctum::actingAs(User::factory()->create());
        $categories = Category::factory(2)->create();

        $response = $this->getJson('/api/categories');
        $response->assertJsonCount(2, 'data')
        ->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'type',
                    'attributes' => ['name']
                ]
            ]
                ]);


    }

    public function test_show(): void
    {
        Sanctum::actingAs(User::factory()->create());
        $category = Category::factory()->create();
        $response = $this->getJson('/api/categories/' . $category->id);
        $response->assertStatus(Response::HTTP_OK)
        ->assertJsonStructure([
            'data' => [
                'id',
                'type',
                'attributes' => ['name']
            ]
        ]);
    }
}
