<?php

namespace Tests\Feature;

use App\Models\Apartament;
use Faker\Provider\en_US\Person;
use Faker\Provider\Text;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class ApartamentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list()
    {
        $response = $this->get(env("APP_URL") . '/api/apartaments');

        $response->dump();
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $ap = Apartament::orderBy("id")->first();

        $response = $this->get(env("APP_URL") . '/api/apartaments/' . $ap->id);

        $response->dump();
        $response->assertStatus(200);
    }

    private function getCurrency(): string
    {
        $cur = [
            "USD",
            "EUR",
            "BRL",
            "CAD",
        ];

        return $cur[rand(0, count($cur) - 1)];
    }

    private function makeProperties(): array
    {
        return [
            ["property" => "balcony", "value" => Str::random(20)],
            ["property" => "rooms", "value" => rand(1, 10)],
        ];
    }

    public function test_create()
    {
        $newAp = [
            "name"        => Str::random(10),
            "price"       => rand(50000, 1000000),
            "currency"    => $this->getCurrency(),
            "description" => Str::random(512),
            "rating"      => mt_rand() / mt_getrandmax(),
            "id_category" => 1,
            "properties"  => $this->makeProperties()
        ];

        $response = $this->post(env("APP_URL") . '/api/apartaments', $newAp);

        $response->assertStatus(201);
    }

    public function test_update()
    {
        $newApData = [
            "name"        => Str::random(10),
            "price"       => rand(50000, 1000000),
            "currency"    => $this->getCurrency(),
            "description" => Str::random(512),
            "rating"      => mt_rand() / mt_getrandmax(),
            "id_category" => 1,
            "properties"  => $this->makeProperties()
        ];

        $ap = Apartament::orderByDesc("id")->first();

        $response = $this->put(env("APP_URL") . '/api/apartaments/' . $ap->id, $newApData);

        $response->assertStatus(204);
    }

    public function test_delete()
    {
        $ap = Apartament::orderByDesc("price")->first();

        $response = $this->delete(env("APP_URL") . '/api/apartaments/' . $ap->id);

        $response->assertStatus(204);
    }
}
