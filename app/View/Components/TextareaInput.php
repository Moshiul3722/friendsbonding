<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextareaInput extends Component
{
    public $name;
    public $value;
    public $rows;
    public $cols;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $value = null, $rows, $cols)
    {
        $this->name = $name;
        $this->value = $value;
        $this->rows = $rows;
        $this->cols = $cols;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.textarea-input');
    }
}
