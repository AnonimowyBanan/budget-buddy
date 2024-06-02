<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectField extends Component
{
    private object $options;
    private int $selected;
    private bool $required;
    private string $name;

    /**
     * Create a new component instance.
     */
    public function __construct(
        object $options,
        string $name,
        int $selected = 0,
        bool $required = false,
    )
    {
        $this->options  = $options;
        $this->name     = $name;
        $this->selected = $selected;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-field', [
            'options'  => $this->options,
            'name'     => $this->name,
            'selected' => $this->selected,
            'required' => $this->required
        ]);
    }
}
