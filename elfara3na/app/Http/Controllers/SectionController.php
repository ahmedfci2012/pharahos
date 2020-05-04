<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Section;

class SectionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('section.create');
    }

    public function create(Request $request) {
		/*$rules = [ 
				'title' => 'required|max:255',
				'short_desc' => 'required|max:255',
				'points' => 'required|numeric|min:0',
				'category' => 'required|numeric|exists:categories,id',
				'brand' => 'required|numeric|exists:brands,id' 
        ];
        */
		//$this->validate ( $request, $rules );
		// Save in Database
		$section = Section::create ( [ 
				
				'name' => $request ['name'],
			
		] );
		        
        session()->flash('message', 'تم أضافة القطاع بنجاح');
        session()->flash('type', 'success');

		return redirect ( "/subsection/index/$section->id" ); // got to add sub section

//return view('section.create');
	}

    public function editGet($section_id){
        $section = DB::table('sections')->where('id', '=',$section_id)->first();
        return view('section.edit',[
                                'section' => $section
                                ]);
        
    }
    
    public function editPost(Request $request){
        $section_id = $request ['section_id'];
        $section_name = $request ['name'];
        DB::table('sections')
            ->where('id', $section_id)
            ->update(['name' => $section_name]);
		        
        session()->flash('message', 'تم تعديل القطاع بنجاح');
        session()->flash('type', 'success');

		return redirect ( "/sections/edit/$section_id" );
    }
    
    public function delete($section_id){
        
        $section = Section::find($section_id);
        $section->delete();
        return redirect ( "/home");
    }
    

}
