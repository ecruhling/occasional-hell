<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Image extends Component
{
    /**
     * Classes applied to the image.
     *
     * @var string
     */
    public $classes;

    /**
     * Loading; lazy or eager.
     *
     * @var string
     */
    public $loading;

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
    public function __construct(string $loading = 'lazy', string $field = null, string $classes = null)
    {
        $this->field = get_field($field)['ID'] ?? null;
        $this->classes = $classes;
        $this->loading = $loading;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.image');
    }
}
