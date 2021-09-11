<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Tag;

class HeaderComponent extends Component
{
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct() {
    //
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|\Closure|string
  */
  public function render() {
    $tags = Tag::all();
    return view('components.header-component', compact("tags"));
  }
}