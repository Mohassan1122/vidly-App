<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    public function sections()
    {
        Session::put('page', 'sections');
        $sections = Section::get()->toArray();
        //dd( $sections);
        return view('superadmin.sections.sections')->with(compact('sections'));
    }
    public function updateSectionStatus(Request $request)
    {

        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }

            Section::where('id', $data['section_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'section_id' => $data['section_id']]);
        }
    }
    // Delete Sections
    public function deleteSections($id)
    {
        Section::where('id', $id)->delete();
        $message = "Section Deleted Successfully";
        return redirect()->back()->with('success_message',  $message);
    }
    // add Edit Sections Sections
    public function addEditSections(Request $request, $id=null)
    {
        Session::put('page', 'sections');

        if ($id =="") {
            $title = "Add Section";
            $section = new Section;
            $message = "Section added Successfully";
        }else{
            $title = "Edit Section";
            $section = Section::find($id);
            $message = "Section Updated Successfully";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            $request->validate([
                'section_name' => 'required',

            ]);
            $section->name = $data['section_name'];
            $section->status = 1;
            $section->save();
            return redirect('superadmin/sections')->with('success_message',  $message);
        }
        return view('superadmin.sections.add_edit_section')->with(compact('title','section'));
    }
}
