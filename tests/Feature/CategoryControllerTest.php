<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCaseWithSetup;

class CategoryControllerTest extends TestCaseWithSetup
{
    use RefreshDatabase;

    public function testCategoriesDisplay()
    {
        $response = $this->get('/categories/' . $this->category->slug);

        $response->assertStatus(200);
        $response->assertSee($this->category->name);
    }

    public function testSubcategoriesDisplay()
    {
        $response = $this->get('/categories/' . $this->category->slug);

        $response->assertStatus(200);
        $response->assertSee($this->subcategory->name);
    }

}
