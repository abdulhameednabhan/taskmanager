<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class PageController extends Controller
{
    public function show($slug)
    {
        
        $page = Page::where('slug', $slug)->firstOrFail();

        
        $loader = new FilesystemLoader(resource_path('views'));
        $twig = new Environment($loader, [
            'cache' => false, 
        ]);

        
        return response($twig->render("themes/{$page->theme}/index.twig", [
            'page' => $page,
        ]));
    }
}
