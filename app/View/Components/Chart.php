<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Chart extends Component
{
    /**
     * Create a new component instance.
     */
    public String $chartId = 'chart';
    public String $name;
    public String $type;
    public array $labels;
    public array $data;
    public array $options;

    public int $height = 300;
    public int $width = 300;

    public function __construct(String $name, String $type, array $labels, array $data, array $options = [], String $chartId = 'chart')
    {
        $this->name     = $name;
        $this->type     = $type;
        $this->labels   = $labels;
        $this->data     = $data;
        $this->options  = $options;
        $this->chartId  = $chartId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chart', [
            'data' => $this->data
        ]);
    }
}
