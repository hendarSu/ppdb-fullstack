<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;
use Illuminate\Http\Request;

class Menus extends Component
{
    public $menus;

    public function mount()
    {
        $this->menus = Menu::all();
    }

    public function render()
    {
        $menus = $this->menus;
        $isPortal = true; // Define the $isPortal variable

        return view('livewire.menus.index', compact('menus'))
        ->layout('components.layouts.app',
        [
            'title' => 'Menu List',
            'isPortal' => $isPortal,
            'menus' => $menus
        ]);
    }

    public function create()
    {
        return view('livewire.menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        Menu::create($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $menu->update($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
