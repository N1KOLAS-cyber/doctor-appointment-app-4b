<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $color;
    public $size;
    public $href;
    public $type;

    /**
     * Create a new component instance.
     */
    public function __construct($color = 'gray', $size = 'md', $href = null, $type = 'button')
    {
        $this->color = $color;
        $this->size = $size;
        $this->href = $href;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.button');
    }

    public function getColorClasses()
    {
        return match($this->color) {
            'blue' => 'bg-blue-600 hover:bg-blue-700 text-white',
            'red' => 'bg-red-600 hover:bg-red-700 text-white',
            'green' => 'bg-green-600 hover:bg-green-700 text-white',
            'yellow' => 'bg-yellow-600 hover:bg-yellow-700 text-white',
            default => 'bg-gray-800 hover:bg-gray-700 text-white',
        };
    }

    public function getSizeClasses()
    {
        return match($this->size) {
            'xs' => 'px-2 py-1 text-xs',
            'sm' => 'px-3 py-1.5 text-sm',
            'lg' => 'px-6 py-3 text-lg',
            default => 'px-4 py-2 text-sm',
        };
    }
}

