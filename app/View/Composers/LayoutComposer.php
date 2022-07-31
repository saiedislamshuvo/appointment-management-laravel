<?php
 
namespace App\View\Composers;

use App\Models\Appearance\AppearanceSetting;
use App\Models\Ssl\SslValidation;
use Illuminate\View\View;
 
class LayoutComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'app_logo' => url(AppearanceSetting::get('app_logo')??''),
            'app_favicon' => url(AppearanceSetting::get('app_favicon')??''),
        ]);
    }
}