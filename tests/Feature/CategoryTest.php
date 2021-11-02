<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list()
    {
        $response = $this->get(env("APP_URL") . '/api/categories');

        $response->dump();
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $category = [
            "name" => Str::random(10)
        ];

        $response = $this->post(env("APP_URL") . '/api/categories', $category);

        $response->assertStatus(201);
    }

    public function test_update()
    {
        $category = [
            "name" => Str::random(10)
        ];

        $c = Category::orderByDesc("id")->first();

        // Update last category
        $response = $this->patch(env("APP_URL") . '/api/categories/' . $c->id, $category);

        $response->assertStatus(204);
    }

    public function test_delete()
    {
        $c = Category::orderByDesc("id")->first();

        // Delete last category
        $response = $this->delete(env("APP_URL") . '/api/categories/' . $c->id);

        $response->assertStatus(204);
    }
}
