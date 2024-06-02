<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    private String $name;
    private String $label;
    private String $type;
    private String $placeholder;
    private mixed $value;

    private bool $required = false;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $label,
        string $type,
        string $placeholder = '',
        mixed $value = null,
        bool $required = false
    )
    {
        $this->name         = $name;
        $this->label        = $label;
        $this->type         = $type;
        $this->placeholder  = $placeholder;
        $this->value        = $value;
        $this->required     = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field', [
            'name'        => $this->name,
            'label'       => $this->label,
            'type'        => $this->type,
            'placeholder' => $this->placeholder,
            'value'       => $this->value,
            'required'    => $this->required,
        ]);
    }
}
