<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;
use App\Image;

class ImageController extends AdminApiController
{
    public function index() {
        return Image::orderBy('id','desc')->get();
    }

    public function store(ImageUploadRequest $request)
    {
        $images = [];
        foreach ($request->file('images') as $image_file) {
            if ($image_file) {
                $image = new Image();
                $image->processUpload($image_file);
                //auto default if none exists
                $image->save();
            }
        }
        return $image;
    }

    /**
     * Delete an image.
     *
     * @return Response
     */
    public function destroy($id, Request $request) {
        $image = Image::find($id);
        if (!$image) abort(404, 'Image '.$id.' not found.');
        $image->delete();
        return "success";
    }

}
