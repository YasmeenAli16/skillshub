<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;

class Social extends Component
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
        $data['setting'] = Setting::select('facebook', 'twiter', 'youtube', 'instagram', 'linkedin')->first();
        return view('components.social')->with($data);
    }
}
