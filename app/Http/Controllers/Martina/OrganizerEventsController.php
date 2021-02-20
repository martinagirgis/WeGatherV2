<?php

namespace App\Http\Controllers\Martina;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizerEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $allEventsData = events::orderBy('id', 'desc')->get();
    //     return view('Organizer.categories.index',compact('allEventsData'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('Organizer.events.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $rules = [
    //         'name' => ['required','min:2','max:60','not_regex:/([%\$#\*<>]+)/'],
    //     ];

    //      $this->validate($request,$rules);


    //     $event = events::create([
    //         'name' => $request->name,
    //         ]);

    //     if ($event) {
    //         return redirect('organizer/categories')->withStatus('word successfully created');
    //     } else {
    //         return redirect('organizer/categories')->withStatus('something went wrong, try again');
    //     }
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $category = events::find($id);

    //     if($category)
    //     {
    //         return view('Admin.categories.create',compact('category'));
    //     }
    //     else
    //     {
    //         return redirect('admin/categories')->withStatus('no word have this id');
    //     }
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $rules = [
    //         'name' => ['required','min:2','max:60','not_regex:/([%\$#\*<>]+)/'],
    //     ];
        

    //     $this->validate($request,$rules);

    //     $currentCategory = Category::find($id);

    //     if ($currentCategory) {
    //         //Remove old image
    //         $this->removeImage($currentCategory->image);
    //         //Add new image
    //         $imageName = $this->imageUploadPost($request);
    //     }
    //     $category = $currentCategory->update([
    //         'name' => $request->name,
    //         'image'=>$imageName,
    //     ]);
    //     if($category){
    //         return redirect('/admin/categories')->withStatus('word successfully updated');
    //        // return 'done';
    //     }
    //     else
    //     {
    //         return redirect('/admin/categories')->withStatus('no word have this id');
    //        //return 'sad';

    //     }
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $category = events::find($id);
    //     if($category)
    //     {
    //         $this->removeImage($category->image);
    //         $category->delete();
    //         return redirect('admin/categories')->withStatus(__('category successfully deleted.'));
    //     }
    //     else
    //     {
    //         return redirect('admin/categories')->withStatus('no category have this id');
    //     }
    // }
}
