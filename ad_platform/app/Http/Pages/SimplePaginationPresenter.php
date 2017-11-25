<?php

namespace App\Http\Pages;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\HtmlString;

class SimplePaginationPresenter extends Paginator {
    
    /**
     * Render the paginator using the given view.
     *
     * @param  string|null  $view
     * @param  array  $data
     * @return string
     */
    public static $defaultSimpleView = 'pagination::simple';
    
    public function render($view = null, $data = [])
    {
        $view = new HtmlString(
            static::viewFactory()->make($view ?: static::$defaultSimpleView, array_merge($data, [
                'paginator' => $this,
            ]))->render()
            );
        return $view;
    }
    
}
