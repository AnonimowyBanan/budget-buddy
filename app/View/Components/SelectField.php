<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectField extends Component
{
    public object $options;
    public int $selected;
    public bool $required;
    public string $name;
    public string $label;

    /**
     * Create a new component instance.
     */
    public function __construct(
        object $options,
        string $name,
        int $selected = 0,
        bool $required = false,
        string $label = ''
    )
    {
        $this->options  = $options;
        $this->name     = $name;
        $this->selected = $selected;
        $this->required = $required;
        $this->label    = $label;
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
            'required' => $this->required,
            'label'    => $this->label,
        ]);
    }
}
