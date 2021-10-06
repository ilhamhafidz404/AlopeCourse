<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use App\Models\Notification;

class navbarcomponent extends Component
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
    $notifications = Notification::all;
    return view('components.admin.navbar-component', compact('notifications'));
  }
}