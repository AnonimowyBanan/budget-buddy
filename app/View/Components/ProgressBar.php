<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProgressBar extends Component
{
    /**
     * Create a new component instance.
     */
    const STATUSES = [
        30 => 'progress-success',
        60 => 'progress-warning',
        90 => 'progress-danger',
    ];
    public int $progress;
    public int $limit;
    public string $statusClass;

    public function __construct(?int $progress, ?int $limit)
    {
        $this->progress     = (int) $progress;
        $this->limit        = (int) $limit;
        $this->statusClass  = $this->getStatus();
    }

    private function getStatus(): string
    {
        foreach (self::STATUSES as $limit => $status) {
            if ($this->progress <= $limit) {
                return $status;
            }
        }

        return 'progress-danger';
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress-bar');
    }
}
