<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {

        $contactList = Contact::orderBy('id','DESC')->get();
        return view('layouts.backend.pages.admin.contact.index', compact('contactList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.backend.pages.admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactRequest $request
     * @return void
     */
    public function store(ContactRequest $request)
    {
        $newContact = new Contact();
        $newContact->name = $request->input('name');
        $newContact->email = $request->input('email');
        $newContact->mobile = $request->input('mobile');
        $operationStatus = $newContact->save();
        if ($operationStatus) {
            $request->session()->flash('flash_notification.message', 'Contact successfully added. ');
            $request->session()->flash('flash_notification.level', 'success');
            return redirect()->route('admin.contact.index');
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('admin.contact.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ContactRequest $request
     * @param  int $id
     * @return Factory|RedirectResponse|View
     */
    public function edit(ContactRequest $request, $id)
    {
        $contact = Contact::find($id);
        if (isset($contact)) {
            return view('layouts.backend.pages.admin.contact.edit', compact('contact'));
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('admin.contact.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(ContactRequest $request, $id)
    {
        $updateContact = Contact::find($id);
        if (isset($updateContact)) {

            $updateContact->name = $request->input('name');
            $updateContact->email = $request->input('email');
            $updateContact->mobile = $request->input('mobile');
            $operationStatus = $updateContact->save();

            if ($operationStatus) {
                $request->session()->flash('flash_notification.message', 'Contact successfully updated. ');
                $request->session()->flash('flash_notification.level', 'success');
                return redirect()->route('admin.contact.index');
            } else {
                $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
                $request->session()->flash('flash_notification.level', 'danger');
                return redirect()->route('admin.contact.edit', $id)->withInput();
            }
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('admin.contact.edit', $id)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ContactRequest $request
     * @param  int $id
     * @return Response
     */
    public function destroy(ContactRequest $request, $id)
    {
        $contact = Contact::find($id);
        if (isset($contact)) {

            $operationStatus = $contact->delete();

            if ($operationStatus) {
                $request->session()->flash('flash_notification.message', 'Contact successfully deleted. ');
                $request->session()->flash('flash_notification.level', 'success');
                return redirect()->route('admin.contact.index');
            } else {
                $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
                $request->session()->flash('flash_notification.level', 'danger');
                return redirect()->route('admin.contact.index');
            }
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('admin.contact.index');
        }
    }

    /**
     * Display the deleted resources
     *
     * @return Response
     */

    public function showDeleted()
    {
        $contactList = Contact::onlyTrashed()->get();
        return view('layouts.backend.pages.admin.contact.deleted', compact('contactList'));
    }

    /**
     * Restore the selected resource
     *
     * @param ContactRequest $request
     * @param $id
     * @return RedirectResponse
     */

    public function restoreDeleted(ContactRequest $request, $id)
    {

        $contact = Contact::withTrashed()->find($id);
        if (isset($contact)) {

            $operationStatus = $contact->restore();

            if ($operationStatus) {
                $request->session()->flash('flash_notification.message', 'Contact successfully restored. ');
                $request->session()->flash('flash_notification.level', 'success');
                return redirect()->route('admin.contact.deleted.show');
            } else {
                $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
                $request->session()->flash('flash_notification.level', 'danger');
                return redirect()->route('admin.contact.deleted.show');
            }
        } else {
            $request->session()->flash('flash_notification.message', 'An error occurred, please try again later. ');
            $request->session()->flash('flash_notification.level', 'danger');
            return redirect()->route('admin.contact.deleted.show');
        }
    }
}
