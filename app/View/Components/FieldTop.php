<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FieldTop extends Component
{

    public $field_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->field_id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.field-top');
    }
}
