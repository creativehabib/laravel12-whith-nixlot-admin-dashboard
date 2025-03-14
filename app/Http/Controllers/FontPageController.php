<?php

namespace App\Http\Controllers;

use App\Models\Page;

class FontPageController extends Controller
{
    /**
     * @param $slug
     * @return mixed
     */
    public function __invoke($slug): mixed
    {
        return Page::findBySlug($slug);
    }
}
