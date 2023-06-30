<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Role;
use App\Models\Slider;
use App\Models\Upkram;
use App\Models\User;
use App\Models\VibhagYojana;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{

    /**
     * screen reader page 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome()
    {
        return view('layouts.frontend.pages.welcome');
    }

    /**
     * splash page 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function splash()
    {
        return view('layouts.frontend.pages.splash');
    }

    /**
     * screen reader page 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function screenReader()
    {
        return view('layouts.frontend.pages.screen-reader');
    }

    /**
     * Home Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $upkramList = Upkram::orderBy('id', 'DESC')->get();
        $vibhag = User::where('role', "<>", 'admin')->get();
        $gallery = Gallery::orderBy('id', 'DESC')->get();
        $slider = Slider::get();
        return view('layouts.frontend.pages.home', compact('upkramList', 'gallery', 'vibhag', 'slider'));
    }

    /**
     * upkram detail 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function upkramDetail($id)
    {
        $upkram = Upkram::find($id);
        return view('layouts.frontend.pages.upkram-detail', compact('upkram'));
    }


    /**
     * District Info
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function districtInfo()
    {
        return view('layouts.frontend.pages.district-info');
    }

    /**
     * gallery Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gallery()
    {
        $category = GalleryCategory::all();
        $gallery = Gallery::all();
        // foreach ($gallery as $key => $element) {

        //     $categoryID = GalleryCategory::find($element->category_id,);
        //     if (!isset($categoryID)) {
        //         unset($gallery[$key]);
        //     } else {
        //         $element['category'] = $categoryID->category;
        //     }
        // }
        return view('layouts.frontend.pages.gallery', compact('gallery', 'category'));
    }


    /**
     * department Plan
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function departmentPlan()
    {
        $vibhagYojanaSEO = VibhagYojana::orderBy('id', 'DESC')->get();
        $vibhagYojana = Role::with(
            [
                'yojnaCategory' => function ($query) {
                    $query->whereHas('yojna');
                },
                'yojnaCategory.yojna',
                'yojnaCategory.yojna.content',
                'yojnaCategory.yojna.content.contentFile',

            ]
        )->has('yojnaCategory')->has('yojnaCategory.yojna')->get();
        // debug($vibhagYojana->toArray());
        // dd($vibhagYojana->toArray());

        return view('layouts.frontend.pages.department-plan', compact('vibhagYojana', 'vibhagYojanaSEO'));
    }

    /**
     * contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        $contact = Contact::all();
        return view('layouts.frontend.pages.contact', compact('contact'));
    }
}
