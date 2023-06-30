<?php

namespace App\Http\Controllers\Vibhag;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\VibhagYojanaRequest;
use App\Models\VibhagYojana;
use App\Models\VibhagYojanaContent;
use App\Models\VibhagYojanaContentPdf;
use App\Models\YojanaCategory;
use DebugBar\DebugBar;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VibhagYojanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $userId = Auth::user()->role;
        $vibhagYojanaList = VibhagYojana::where('created_by', $userId)->orderBy('id', 'ASC')->get();
        return view('layouts.backend.pages.vibhag.vibhag-yojana.index', compact('vibhagYojanaList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $userId = Auth::user()->role;
        $categoryList = YojanaCategory::where('created_by', $userId)->orderBy('id', 'ASC')->get();
        return view('layouts.backend.pages.vibhag.vibhag-yojana.create', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VibhagYojanaRequest $request
     * @return void
     */
    public function store(VibhagYojanaRequest $request)
    {
        // dd($request);
        $contentTitle = $request->input('contentTitle');
        $contentDescription = $request->input('contentDescription');

        $newVibhagYojana = new VibhagYojana();
        $newVibhagYojana->created_by = Auth::user()->role;
        $newVibhagYojana->name = $request->input('name');
        $newVibhagYojana->category_id = $request->input('category');
        $newVibhagYojana->discription = $request->input('discription');
        $operationStatus = $newVibhagYojana->save();
        $findID = $newVibhagYojana->id;

        if ($operationStatus) {
            if ($request->input('contentTitle') && $request->input('contentDescription')) {
                if (sizeof($contentTitle) > 0) {
                    foreach ($contentTitle as $key => $type) {
                        $storeContent = new VibhagYojanaContent();
                        $storeContent->vibhag_yojana_id = $findID;
                        $storeContent->title = $contentTitle[$key];
                        $storeContent->description = $contentDescription[$key];
                        $storeContent->save();
                        $findIDx = $storeContent->id;

                        // dump($request->file('contentFile')[$key]);
                        if (isset($request->file('contentFile')[$key])) {

                            // dd($request->file('contentFile'));
                            // if ($request->hasFile('contentFile')[$key]) {

                            $pdf_files = $request->file('contentFile')[$key];
                            foreach ($pdf_files as $pdf_file) {
                                // dump($pdf_files);

                                if ($pdf_file->isValid()) {
                                    // $pdf_file = $request->file('contentFile')[$key]; // the image  file
                                    $pdf_file_name = $pdf_file->getClientOriginalName(); //the file name with extension
                                    $pdf_file_extension = $pdf_file->getClientOriginalExtension(); // the file extension
                                    $allowed_file_types = ['pdf', 'PDF']; // allowed extensions


                                    if (in_array($pdf_file_extension, $allowed_file_types)) {
                                        $pdf_file_path = 'vibhag_yojana_' . time() . '.pdf'; //generate new random name of the file

                                        // move uploaded files to directories and generate url
                                        $pdf_file->move(public_path('assets/backend/PDF-files/vibhag-yojana-content'), $pdf_file_path);

                                        //store in database
                                        $newFile = new VibhagYojanaContentPdf();
                                        $newFile->vibhag_yojan_content_id = $findIDx;
                                        $newFile->file_name = $pdf_file_name;
                                        $newFile->file_path = $pdf_file_path;
                                        $newFile->save();
                                    }
                                } else {
                                    $request->session()->flash('flash_notification.message', 'Only PDF files are allowed, no other format is allowed.');
                                    $request->session()->flash('flash_notification.level', 'danger');
                                    return redirect()->route('vibhag.vibhag-yojana.index')->withInput();
                                }
                            }
                            // dd('dddd');
                        }
                    }
                }
            }

            if ($request->hasFile('file')) {
                if ($request->file('file')->isValid()) {
                    $pdf_file = $request->file('file'); // the image  file
                    $pdf_file_name = $pdf_file->getClientOriginalName(); //the file name with extension
                    $pdf_file_extension = $pdf_file->getClientOriginalExtension(); // the file extension
                    $allowed_file_types = ['pdf', 'PDF']; // allowed extensions

                    if (in_array($pdf_file_extension, $allowed_file_types)) {
                        $pdf_file_path =  'vibhag_yojana_' . time() . '.pdf'; //generate new random name of the file

                        // move uploaded files to directories and generate url
                        $pdf_file->move(public_path('assets/backend/PDF-files/vibhag-yojana'), $pdf_file_path);

                        //store in database
                        $newFile = VibhagYojana::find($findID);
                        $newFile->file_name = $pdf_file_name;
                        $newFile->file_path = $pdf_file_path;
                        $FileStatus = $newFile->save();

                        if ($FileStatus) {
                            $request->session()->flash('flash_notification.message', 'New Vibhag & Yojana was successfully created.');
                            $request->session()->flash('flash_notification.level', 'success');
                            return redirect()->route('vibhag.vibhag-yojana.index');
                        } else {
                            $request->session()->flash('flash_notification.message', 'Something went wrong, please try again later.');
                            $request->session()->flash('flash_notification.level', 'danger');
                            return redirect()->route('vibhag.vibhag-yojana.index');
                        }
                    } else {
                        $request->session()->flash('flash_notification.message', 'Only PDF files are allowed, no other format is allowed.');
                        $request->session()->flash('flash_notification.level', 'danger');
                        return redirect()->route('vibhag.vibhag-yojana.index')->withInput();
                    }
                }
            } else {
                $request->session()->flash('flash_notification.message', 'New Vibhag & Yojana was successfully created.');
                $request->session()->flash('flash_notification.level', 'success');
                return redirect()->route('vibhag.vibhag-yojana.index');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param VibhagYojanaRequest $request
     * @param  int $id
     * @return Factory|RedirectResponse|View
     */
    public function edit(VibhagYojanaRequest $request, $id)
    {
        $userId = Auth::user()->role;
        $vibhagYojana = VibhagYojana::where(["id" => $id, "created_by" => $userId])->firstOrfail();
        if (isset($vibhagYojana)) {
            $categoryList = YojanaCategory::where('created_by', $userId)->orderBy('id', 'ASC')->get();
            $contentList = VibhagYojanaContent::where('vibhag_yojana_id', $id)->get();
            return view('layouts.backend.pages.vibhag.vibhag-yojana.edit', compact('vibhagYojana', 'categoryList', 'contentList'));
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('vibhag.vibhag-yojana.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VibhagYojanaRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(VibhagYojanaRequest $request, $id)
    {
        $category = $request->input('category');
        $name = $request->input('name');
        $discription = $request->input('discription');

        $contentTitle = $request->input('contentTitle');
        $contentDescription = $request->input('contentDescription');
        $contentID = $request->input('existingID');

        //store in database
        $updateFile = VibhagYojana::where(["id" => $id, "created_by" => Auth::user()->role])->firstOrfail();
        $updateFile->category_id = $category;
        $updateFile->name = $name;
        $updateFile->discription = $discription;
        $UpdateStatus = $updateFile->save();

        // onclick remove clone delete existing file 
        $deletefile = VibhagYojanaContent::where('vibhag_yojana_id', $id)->pluck('id');
        if (isset($contentID)) {
            $deletefile = VibhagYojanaContent::where('vibhag_yojana_id', $id)->whereNotIn('id', $contentID)->pluck('id');
        }
        // dd($deletefile);
        VibhagYojanaContentPdf::whereIn('vibhag_yojan_content_id', $deletefile)->forcedelete();
        VibhagYojanaContent::whereIn('id', $deletefile)->forcedelete();
        if ($UpdateStatus) {
            if ($request->input('contentTitle') && $request->input('contentDescription')) {

                if (sizeof($contentTitle) > 0) {
                    foreach ($contentTitle as $key => $type) {

                        if (!isset($contentID[$key])) {
                            $storeContent = new VibhagYojanaContent();
                            $storeContent->vibhag_yojana_id = $id;
                            $storeContent->title = $contentTitle[$key];
                            $storeContent->description = $contentDescription[$key];
                            $storeContent->save();
                            $findIDx = $storeContent->id;
                            // dd($findIDx);
                        } else {
                            $storeContent = VibhagYojanaContent::find($contentID[$key]);
                            $storeContent->vibhag_yojana_id = $id;
                            $storeContent->title = $contentTitle[$key];
                            $storeContent->description = $contentDescription[$key];
                            $storeContent->save();
                            $findIDx = $storeContent->id;
                        }

                        // dump($request->file('contentFile')[$key]);
                        if (isset($request->file('contentFile')[$key])) {
                            $pdf_files = $request->file('contentFile')[$key];
                            foreach ($pdf_files as $pdf_file) {
                                // dd($request->file('contentFile'));
                                // if ($request->hasFile('contentFile')[$key]) {

                                if ($pdf_file->isValid()) {
                                    // $pdf_file = $request->file('contentFile')[$key]; // the image  file
                                    $pdf_file_name = $pdf_file->getClientOriginalName(); //the file name with extension
                                    $pdf_file_extension = $pdf_file->getClientOriginalExtension(); // the file extension
                                    $pdf_file_path = pathinfo($pdf_file_name, PATHINFO_FILENAME) . '_' . time() . '.' . $pdf_file_extension; //generate new random name of the file
                                    $allowed_file_types = ['pdf', 'PDF']; // allowed extensions

                                    if (in_array($pdf_file_extension, $allowed_file_types)) {

                                        // move uploaded files to directories and generate url
                                        $pdf_file->move(public_path('assets/backend/PDF-files/vibhag-yojana-content'), $pdf_file_path);

                                        //store in database
                                        // VibhagYojanaContentPdf::where('vibhag_yojan_content_id', $findIDx)->delete();
                                        $newFile = new VibhagYojanaContentPdf();
                                        $newFile->vibhag_yojan_content_id = $findIDx;
                                        $newFile->file_name = $pdf_file_name;
                                        $newFile->file_path = $pdf_file_path;
                                        $newFile->save();
                                    }
                                } else {
                                    $request->session()->flash('flash_notification.message', 'Only PDF files are allowed, no other format is allowed.');
                                    $request->session()->flash('flash_notification.level', 'danger');
                                    return redirect()->route('vibhag.vibhag-yojana.index')->withInput();
                                }
                            }
                        }
                    }
                }
            }

            if ($request->hasFile('file')) {
                if ($request->file('file')->isValid()) {

                    $pdf_file = $request->file('file'); // the image  file
                    $pdf_file_name = $pdf_file->getClientOriginalName(); //the file name with extension
                    $pdf_file_extension = $pdf_file->getClientOriginalExtension(); // the file extension
                    $pdf_file_path = pathinfo($pdf_file_name, PATHINFO_FILENAME) . '_' . time() . '.' . $pdf_file_extension; //generate new random name of the file
                    $allowed_file_types = ['pdf', 'PDF']; // allowed extensions

                    if (in_array($pdf_file_extension, $allowed_file_types)) {

                        // move uploaded files to directories and generate url
                        $pdf_file->move(public_path('assets/backend/PDF-files/vibhag-yojana'), $pdf_file_path);

                        //store in database
                        $updateFile = VibhagYojana::find($id);
                        $updateFile->file_name = $pdf_file_name;
                        $updateFile->file_path = $pdf_file_path;
                        $FileUpdateStatus = $updateFile->save();

                        if ($FileUpdateStatus) {
                            $request->session()->flash('flash_notification.message', 'New Vibhag & Yojana was successfully updated.');
                            $request->session()->flash('flash_notification.level', 'success');
                            return redirect()->route('vibhag.vibhag-yojana.index')->withInput();
                        } else {
                            $request->session()->flash('flash_notification.message', 'Something went wrong, please try again later.');
                            $request->session()->flash('flash_notification.level', 'danger');
                            return redirect()->route('vibhag.vibhag-yojana.edit', $id);
                        }
                    } else {
                        $request->session()->flash('flash_notification.message', 'Only PDF files are allowed, no other format is allowed.');
                        $request->session()->flash('flash_notification.level', 'danger');
                        return redirect()->route('vibhag.vibhag-yojana.edit', $id)->withInput();
                    }
                }
            } else {
                $request->session()->flash('flash_notification.message', 'New Vibhag & Yojana was successfully updated.');
                $request->session()->flash('flash_notification.level', 'success');
                return redirect()->route('vibhag.vibhag-yojana.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param VibhagYojanaRequest $request
     * @param  int $id
     * @return Response
     */
    public function destroy(VibhagYojanaRequest $request, $id)
    {
        $vibhagYojana = VibhagYojana::find($id);
        if (isset($vibhagYojana)) {
            $operationStatus = $vibhagYojana->delete();

            if ($operationStatus) {
                $request->session()->flash('flash_notification.message', 'Vibhag & Yojana successfully deleted. ');
                $request->session()->flash('flash_notification.level', 'success');
                return redirect()->route('vibhag.vibhag-yojana.index');
            } else {
                $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
                $request->session()->flash('flash_notification.level', 'danger');
                return redirect()->route('vibhag.vibhag-yojana.index');
            }
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('vibhag.vibhag-yojana.index');
        }
    }

    /**
     * Display the deleted resources
     *
     * @return Response
     */

    public function showDeleted()
    {
        $userId = Auth::user()->role;
        $vibhagYojanaList = VibhagYojana::where('created_by', $userId)->onlyTrashed()->get();
        return view('layouts.backend.pages.vibhag.vibhag-yojana.deleted', compact('vibhagYojanaList'));
    }

    /**
     * Restore the selected resource
     *
     * @param VibhagYojanaRequest $request
     * @param $id
     * @return RedirectResponse
     */

    public function restoreDeleted(VibhagYojanaRequest $request, $id)
    {

        $vibhagYojana = VibhagYojana::withTrashed()->find($id);
        if (isset($vibhagYojana)) {

            $operationStatus = $vibhagYojana->restore();

            if ($operationStatus) {
                $request->session()->flash('flash_notification.message', 'Vibhag & Yojana was successfully restored. ');
                $request->session()->flash('flash_notification.level', 'success');
                return redirect()->route('vibhag.vibhag-yojana.deleted.show');
            } else {
                $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
                $request->session()->flash('flash_notification.level', 'danger');
                return redirect()->route('vibhag.vibhag-yojana.deleted.show');
            }
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('vibhag.vibhag-yojana.deleted.show');
        }
    }
}
