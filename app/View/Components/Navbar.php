<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['categories'] = Category::select('id', 'name')->active()->get();
        return view('components.navbar')->with($data);
    }
}
