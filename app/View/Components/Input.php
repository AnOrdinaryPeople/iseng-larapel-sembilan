<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * ```blade
     * <label>{{ $label }}</label>
     * ```
     *
     * @var string
     */
    public $label;

    /**
     * ```blade
     *  @if($required) <span class="text-danger">*</span> @endif
     * ```
     *
     * @var bool
     */
    public $required;

    /**
     * ```blade
     * <input type="{{ $type }}" />
     * ```
     *
     * @var string
     */
    public $type;

    /**
     * ```blade
     * <input class="@error($name) is-invalid @enderror" name="{{ $name }}" />
     * ```
     *
     * @var string
     */
    public $name;

    /**
     * ```blade
     * <input value="{{ $value }}" />
     * ```
     *
     * @var string
     */
    public $value;

    /**
     * ```blade
     * <input @if($disabled) disabled @endif />
     * ```
     *
     * @var bool
     */
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $type, $name, $value = null, $required = 'true', $disabled = 'false')
    {
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->required = $required === 'true' || $required === true;
        $this->disabled = $disabled === 'true' || $disabled === true;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
