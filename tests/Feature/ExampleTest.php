<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Category,Subcategory};
use Tests\TestCase;
use Illuminate\Support\Str;

class ExampleTest extends TestCase
{
    use RefreshDatabase;


    public function test_example()
    {


        Category::factory()->create([
            'name' => 'Celulares y tablets',
            'slug' => Str::slug('Celulares y tablets'),
            'icon' => '<i class="fas fa-mobile-alt"></i>'
        ]);
        Subcategory::factory()->create([
            'category_id' => 1,
            'name' => 'Celulares y smartphones',
            'slug' => Str::slug('Celulares y smartphones'),
            'color' => true
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
