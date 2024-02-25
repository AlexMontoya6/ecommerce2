<?php

namespace Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Category, Subcategory};
use Illuminate\Support\Str;

abstract class TestCaseWithSetup extends TestCase
{
    use RefreshDatabase;

    protected $category;
    protected $subcategory;

    public function setUp(): void
    {
        parent::setUp();

        // Configuración común aquí
        $this->category = Category::factory()->create([
            'name' => 'Celulares y tablets',
            'slug' => Str::slug('Celulares y tablets'),
            'icon' => '<i class="fas fa-mobile-alt"></i>'
        ]);

        $this->subcategory = Subcategory::factory()->create([
            'category_id' => $this->category->id,
            'name' => 'Celulares y smartphones',
            'slug' => Str::slug('Celulares y smartphones'),
            'color' => true
        ]);

    }
}
