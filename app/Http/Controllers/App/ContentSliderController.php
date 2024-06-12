<?php

namespace App\Http\Controllers\App;

use App\Models\ContentSlider;
use Illuminate\Http\Request;

class ContentSliderController
{
    public function index()
    {
        $sliders = ContentSlider::orderBy('position')->get();
        return view('app.pages.content-slider.index', ["sliders" => $sliders]);
    }

    public function create()
    {
        return view('app.pages.content-slider.create', ["mode" => 'create']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'link_text' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'required|image|max:2048'
        ]);

        // $validated['position'] = (int)$validated['position'];

        $maxPosition = ContentSlider::max('position');

        // dd($maxPosition);    
        // Shift existing sliders down by one position
        ContentSlider::query()->increment('position');

        $path = $request->file('img')->store('sliders', 'public');
        $url = tenant_asset($path);

        ContentSlider::create([
            'name' => $validated['name'],
            'link' => $validated['link'],
            'link_text' => $validated['link_text'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'img' => $url,
            'position' => 1,
        ]);

        return redirect('/slider')->with('success', 'Slider created successfully.');
    }

    public function edit(ContentSlider $slider)
    {
        return view('app.pages.content-slider.edit', ["slider" => $slider, "mode" => 'edit']);
    }

    public function update(Request $request, ContentSlider $slider)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'link_text' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'position' => 'required|integer',
        ]);

        // Check if the new position value is already taken by another slider
        if ($slider->position !== $validated['position'] && ContentSlider::where('position', $validated['position'])->exists()) {
            // If so, find the slider that currently occupies the new position
            $conflictingSlider = ContentSlider::where('position', $validated['position'])->first();

            // Increment the position of the conflicting slider to make room for the updated slider
            $conflictingSlider->update(['position' => $slider->position]);
        }

        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('sliders', 'public');
            $url = tenant_asset($path);
            $slider->img = $url;
        }

        $slider->name = $validated['name'];
        $slider->link = $validated['link'];
        $slider->link_text = $validated['link_text'];
        $slider->title = $validated['title'];
        $slider->description = $validated['description'];
        $slider->position = $validated['position'];
        $slider->save();

        return redirect('/slider')->with('success', 'Slider updated successfully.');
    }
}
