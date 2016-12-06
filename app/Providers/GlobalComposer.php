<?php

namespace App\Providers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class GlobalComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('guest', Auth::guest());
        $view->with('currentUser', Auth::user());
        $view->with('signedIn', Auth::check());
    }

}