<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Size;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Color;
use App\Models\ColorProduct as TbPivot;

class ProductsInfo extends Component
{
    use WithPagination;

    public $search;

    public $category, $subcategories, $subcategory, $colors, $size;

    public $brands, $categories, $image, $image2;
    public $editImage;

    public function getBrands()
    {
        $this->brands = Brand::all();
    }


    public function getCategories()
    {
        $this->categories = Category::all();
    }

    public function mount()
    {
        $this->getBrands();
        $this->getCategories();
        $this->colors = Color::all();

        $this->image = 1;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $rowCount=10;
        if(request("itemsPerPage"))
        {
            $rowCount = request("itemsPerPage");
        }
        $products = Product::where('name', 'LIKE', "%{$this->search}%")->paginate($rowCount);

        return view('livewire.admin.products-info', compact('products'))->layout('layouts.admin');
    }
}
