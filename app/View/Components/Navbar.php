<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $menuItems;
    
    public function __construct()
    {
        // Puedes cargar los items del menú desde la base de datos aquí
        $this->menuItems = [
            ['label' => 'Home', 'route' => 'home'],
            ['label' => 'About', 'route' => 'about'],
            ['label' => 'Services', 'route' => 'services'],
            ['label' => 'Pricing', 'route' => 'pricing'],
            ['label' => 'Contact', 'route' => 'contact'],
        ];
    }

    public function render()
    {
        return view('components.navbar');
    }
}