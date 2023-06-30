<?php

namespace App\Http\Controllers\Vibhag;

use App\Http\Controllers\Controller;
use App\Models\YojanaCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class YojanaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $userId = Auth::user()->role;
        $categoryList = YojanaCategory::where('created_by', $userId)->orderBy('id', 'ASC')->get();
        return view('layouts.backend.pages.vibhag.YojanaCategory.index', compact('categoryList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('layouts.backend.pages.vibhag.YojanaCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $newCategory = new YojanaCategory();
        $newCategory->created_by = Auth::user()->role;
        $newCategory->category = $request->input('category');
        $operationStatus = $newCategory->save();
        if ($operationStatus) {
            $request->session()->flash('flash_notification.message', 'Category was successfully added.');
            $request->session()->flash('flash_notification.level', 'success');
            return redirect()->route('vibhag.YojanaCategory.index');
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('vibhag.YojanaCategory.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Factory|RedirectResponse|View
     */
    public function edit(Request $request, $id)
    {
        $category = YojanaCategory::where(["id" => $id, "created_by" => Auth::user()->role])->firstOrfail();
        if (isset($category)) {
            return view('layouts.backend.pages.vibhag.YojanaCategory.edit', compact('category'));
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('vibhag.YojanaCategory.index');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $Category = YojanaCategory::where(["id" => $id, "created_by" => Auth::user()->role])->firstOrfail();
        if (isset($Category)) {
            $Category->category = $request->input('category');
            $operationStatus = $Category->save();

            if ($operationStatus) {
                $request->session()->flash('flash_notification.message', 'Category was successfully updated. ');
                $request->session()->flash('flash_notification.level', 'success');
                return redirect()->route('vibhag.YojanaCategory.index');
            } else {
                $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
                $request->session()->flash('flash_notification.level', 'danger');
                return redirect()->route('vibhag.YojanaCategory.edit', $id)->withInput();
            }
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('vibhag.YojanaCategory.edit', $id)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $Category = YojanaCategory::find($id);
        if (isset($Category)) {

            $operationStatus = $Category->delete();

            if ($operationStatus) {
                $request->session()->flash('flash_notification.message', 'Category was successfully deleted. ');
                $request->session()->flash('flash_notification.level', 'success');
                return redirect()->route('vibhag.YojanaCategory.index');
            } else {
                $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
                $request->session()->flash('flash_notification.level', 'danger');
                return redirect()->route('vibhag.YojanaCategory.index');
            }
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('vibhag.YojanaCategory.index');
        }
    }
    /**
     * Display the deleted resources
     *
     * @return Factory|View
     */

    public function showDeleted()
    {
        $userId = Auth::user()->role;
        $categoryList = YojanaCategory::where('created_by', $userId)->onlyTrashed()->get();
        return view('layouts.backend.pages.vibhag.YojanaCategory.deleted', compact('categoryList'));
    }

    /**
     * Restore the selected resource
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */

    public function restoreDeleted(Request $request, $id)
    {

        $Category = YojanaCategory::onlyTrashed()->find($id);
        if (isset($Category)) {

            $operationStatus = $Category->restore();

            if ($operationStatus) {
                $request->session()->flash('flash_notification.message', 'Category was successfully restored. ');
                $request->session()->flash('flash_notification.level', 'success');
                return redirect()->route('vibhag.YojanaCategory.deleted.show');
            } else {
                $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
                $request->session()->flash('flash_notification.level', 'danger');
                return redirect()->route('vibhag.YojanaCategory.deleted.show');
            }
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('vibhag.YojanaCategory.deleted.show');
        }
    }
}
