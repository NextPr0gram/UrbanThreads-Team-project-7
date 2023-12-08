<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $title; // ** This is the title of the product
    public $image; // ** This is the image of the product
    public $price; // ** This is the price of the product
    /**
     * Create a new component instance.
     */
    public function __construct($title, $price)
    {
        $this->title = $title; // ** Assign the title to the $title variable
        // $this->image = $image; // ** Assign the image to the $image variable
        $this->price = $price; // ** Assign the price to the $price variable
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.products-card');
    }
}
