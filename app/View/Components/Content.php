<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Content extends Component
{
    /**
     * The image field name.
     *
     * @var string
     */
    public $field;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $field = null)
    {
        $this->field = get_field($field) ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.content');
    }
}
