<?php

namespace App\Http\Controllers\Admin;

use App\Actions\File;
use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::get();
        return view('backend.website.index', compact('websites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        return view('backend.website.edit', compact('website'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        $oldImagePath = $website->logo;

        if ($request->has('logo')) {
            $file = $request->file('logo');

            $website->update([
                'title' => $request->title,
                'logo' => File::update($file, $oldImagePath, 'website'),
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'behance' => $request->behance,
                'footer_1' => $request->footer_1,
                'footer_2' => $request->footer_2
            ]);
        } else {
            $website->update([
                'title' => $request->title,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'behance' => $request->behance,
                'footer_1' => $request->footer_1,
                'footer_2' => $request->footer_2
            ]);
        }
        $this->notificationMessage('Data Update Successfully!');
        return redirect()->route('admin.website.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        //
    }
}
