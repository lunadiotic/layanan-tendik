<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Layanan;

class MenuLayananComposer
{
    public function compose(View $view)
    {
        $layanan = Layanan::all();

        $view->with('layananMenu', $layanan);
    }
}
