<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\WebCapsule;

class GalleryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
        $this->webCapsuleClass = new WebCapsule();
    }

    public function index() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.gallery.add_gallery_image',['title'=>'Add Gallery']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'image_name' => 'required',
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = array(
            'image_name' => $request->image_name,
            'description' => $request->description,
            'created_at' => $this->now(),
            'created_by' => Auth::user()->id
        );
        // Start Image upload
        if ($request->hasFile('gallery_image')) {
            $files = $request->gallery_image;
            $file_name = $files->getClientOriginalName();
            $picture = date('His') . "_" . $file_name; // add datetime for unique file name
            $uploadPath = "resources/assets/images/gallery/";
            $image_url = $uploadPath . $picture;
            $uploadResult = $files->move($uploadPath, $picture);
            if ($uploadResult) {
                $data['image_url'] = $image_url;
                DB::table('gallery')->insert($data);
                $message = "You have successfully upload image.";
            } else {
                $error = $files->getErrorMessage();
                $message = "Image not uploaded and data not Inserted-" . $error;
            }
        }
        // End image upload

        return back()->with('msg', $message);
    }

    public function manage() {
        $images = DB::table('gallery')->paginate(5);
        return view('admin.gallery.manage_gallery', ['images' => $images,'title'=>'Manage gallery']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $galleryImageByID = DB::table('gallery')
                ->where('id', $id)
                ->first();
        return view('admin.gallery.view_gallery_image', ['title'=>'View Gallery','image' => $galleryImageByID]);
    }
public function updatePublicationStatus($status, $id) {
        if ($status == 'publish') {
            $change = 1;
        }
        if ($status == 'unpublish') {
            $change = 0;
        }
        $data=array(
            'publication_status' => $change
        );
        $res = $this->webCapsuleClass->updateInfo('gallery', $data,$id);
        return back()->with('msg', $res);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $galleryImageByID = DB::table('gallery')
                ->where('id', $id)
                ->first();
        return view('admin.gallery.edit_gallery_image', ['title'=>'Edit gallery Image','galleryImageById' => $galleryImageByID]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $this->validate($request, [
            'image_name' => 'required'
        ]);
        $data = array(
            'image_name' => $request->image_name,
            'description' => $request->description,
            'publication_status' => $request->publication_status,
            'updated_at' => $this->now(),
            'updated_by' => Auth::user()->id
        );
        // Start Image upload
        if ($request->hasFile('gallery_image')) {
            $this->validate($request, [
                'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $gallery=DB::table('gallery')->where('id', $request->image_id)->first();
            // Delete old image first
            if($gallery->image_url){
                if (file_exists($gallery->image_url)) {
                    unlink($gallery->image_url);
                }
            }
            // end old emage delete
            $files = $request->gallery_image;
            $file_name = $files->getClientOriginalName();
            $picture = date('His') . "_" . $file_name; // add datetime for unique file name
            $uploadPath = "resources/assets/images/gallery/";
            $image_url = $uploadPath . $picture;
            $uploadResult = $files->move($uploadPath, $picture);
            if ($uploadResult) {
                $data['image_url'] = $image_url;
            } else {
                $error = $files->getErrorMessage();
                $message = "Image not uploaded and data not Inserted-" . $error;
                return back()->with('msg', $message);                
            }
        }
        // end image update
        $result = DB::table('gallery')
                ->where('id', $request->image_id)
                ->update($data);
        if ($result) {
            $message = "You have successfully updated.";
        }
        return redirect('manage-gallery')->with('msg', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
         $res=$this->webCapsuleClass->deleteItem('gallery',$id);    
         return back()->with('msg',$res);
    }
    public function destroy($id) {
        //
    }

}
