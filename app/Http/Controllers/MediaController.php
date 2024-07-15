<?php

namespace App\Http\Controllers;

use App\Models\media;
use Illuminate\Http\Request;

class MediaController extends Controller
{

    public function index()
    {
        $mediapage = media::latest()->paginate(50);
        return view('media.WFmedia' , compact('mediapage'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name',
            'title',
            'description',
            'alt',
            'imagef'
        ]);


        $media = new media;
        $media->name = $request->name;
        $media->title = $request->title;
        $media->description = $request->description;
        $media->alt = $request->alt;
        // if ($request->file('imagef')) {
        //     $file = $request->file('imagef');
            // $filename = 'media/' . $file->getClientOriginalName();
        //     $file->move(public_path('media'), $filename);
        //     $media['image'] = $filename;
        // }

        $name = str_replace([' ',' - ','---','_'], "-",request()->imagef->getClientOriginalName());

        $request->imagef->move('media', strtolower($name));

        $media->image = 'media/' . strtolower($name);

        $media->save();
        return back()->with('success' , 'Successfully uploaded.');
        
        
    }
    public function edit($id)
    {
        $media = media::find($id) ;
        return view('media.edit' , compact('media'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
                'title',
                'name',
                'alt',
                'description',
            ]);
            $media = media::find($id);
            $input = $request->all();
            
            $media->update($input);
            return back();
    }
    public function store_crop(Request $request)
    {
        $request->validate([
            'name',
            'title',
            'description',
            'alt',
            'image'
        ]);


        $media = new media;
        $media->name = $request->name;
        $media->title = $request->title;
        $media->description = $request->description;
        $media->alt = $request->alt;
        $media->base64 = $request->image;
        $media->save();
        return back()->with('success' , 'Successfully uploaded.');
        
        
    }
    
    
    
    public function imageupload(Request $request) {

        $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg'
        ]);

        $data = [];

        if ($request->hasfile('images')) {
            foreach ($request->images as $image) {
                $detail = str_replace(['.jpeg' , '.jpg' , '.png' , '.gif' , '.svg'  , '.webp'], '',$image->getClientOriginalName());
                $finaldetail =  $detail;
                $name = env('PUBLIC_MEDIA') .  str_replace([' ',' - ','---','_'], "-",$image->getClientOriginalName());
                if ($image->move('media', strtolower($name))) {
                    $data[] = media::create([
                        "image" => strtolower($name),
                        "name" => strtolower($finaldetail),
                        "description" => strtolower($finaldetail),
                        "title" => strtolower($finaldetail),
                        "alt" => strtolower($finaldetail),
                    ]);
                }
            }
         }
         return back();

    }


    public function ajax_paginate(Request $request){
        $media = media::where('base64',null)->orderBy('id', 'desc')->paginate(30);
        $mediacrop = media::where('image',null)->get();
        return view('media.paginate_records',compact('media','mediacrop'))->render();
    }
    
    public function fileEdit($id){
        $media = media::find($id);
        return response()->json([
            'status' =>200,
            'media' =>$media,
        ]);
    }

    public function fileeditmedia($idedit){
        $media = media::find($idedit);
        return response()->json([
            'status' =>200,
            'media' =>$media,
        ]);
    }

    public function fileselectmedia($idselect){
        $media = media::find($idselect);
        return response()->json([
            'status' =>200,
            'media' =>$media,
        ]);
    }

    public function updatemedia(Request $request){
        $id = $request->input('id');
        $media = media::find($id);
        $media->image = $request->input('image');
        $media->name = $request->input('name');
        $media->title = $request->input('title');
        $media->description = $request->input('description');
        $media->alt = $request->input('alt');
        
        $media->update();
        return back();
    }

    public function editAjax($id)
    {
        if(request()->ajax())
        {
            $data = media::findOrFail($id);
            $data->input()->update();
            return response()->json(['data' => $data]);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        media::where('id', $id)->delete();
        return response()->json(['status'=>'200']);
    }
    
    public function deleteallforever(Request $request)
    {
        $ids = $request->ids;
        media::whereIn('id',explode(",",$ids))->forceDelete();
        return response()->json(['success'=>"articles Deleted successfully."]);
    }
    
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $products=media::where('title','LIKE','%'.$request->search."%")->orWhere('name','LIKE','%'.$request->search."%")->get();
            if($products){
                foreach ($products as $key => $product) {
                $output.='<div class="col-xl-2 py-2 record" data-image-id="'. $product->id .'">'.
                '<div class="border-image-manager menu-link" id="id1">'.
                '<img class="editbtn" data-id="'. $product->id .'" src="'. $product->image .'" width="100%" style="border-radius:0;padding:0" value="'. $product->id .'">'.
                '<div class="action-media">'.
                    '<button type="button" class="deletebtn btn-media" value="'. $product->id .'" id="'. $product->id .'"><i class="fa-solid fa-trash"></i></button>'.
                '</div>'.
                
                '</div>'.
                
                '</div>';
                }
                return Response($output);
               }
           }
           return 'none';
    
    }




}
