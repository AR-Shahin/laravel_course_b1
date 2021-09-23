<?php

namespace App\Http\Controllers\Admin;

use App\Actions\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('Backend.Slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $file = $request->file('image');

        $result = Slider::create([
            'title' => $request->title,
            'image' => File::upload($file, 'slider')
        ]);

        if ($result) {
            $this->notificationMessage('Data Save Successfully!');
            return redirect()->route('admin.slider.index');
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('Backend.Slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $OldImgPath = $slider->image;

        if ($request->has('image')) {
            $file = $request->file('image');
            File::delete($slider);
            $slider->update([
                'title' => $request->title,
                'image' => File::upload($file, 'slider')
            ]);
        } else {
            $slider->update([
                'title' => $request->title
            ]);
        }
        $this->notificationMessage('Data Update Successfully!');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        File::deleteFile($slider->image);
        $slider->delete();
        $this->notificationMessage('Data Delete Successfully!');
        return redirect()->route('admin.slider.index');
    }
}
