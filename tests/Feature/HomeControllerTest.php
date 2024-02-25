<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Product, Image};
use Tests\TestCaseWithSetup;
use Illuminate\Support\Str;

class HomeControllerTest extends TestCaseWithSetup
{
    use RefreshDatabase;

    public function test_home_display(){
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    // public function testHomeDisplayProducts()
    // {
    //     // $response = $this->get('/');

    //     // $products = Product::factory(50)->create([
    //     //     'category_id' => 1
    //     // ]);
    //     // // Verificar que se muestren al menos 5 productos de la categoría
    //     // foreach ($products as $product) {
    //     //     $response->assertSee(Str::limit($product->name, 20), false);
    //     // }


    // }

}
