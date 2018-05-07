<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Filesystem\Filesystem;

class Image extends Model
{    
    protected $fillable = [
            'filename'
        ];

    public $scaled_sizes = [
            'xs' => 16,
            'sm' => 64,
            'md' => 200,
            'lg' => 400,
            'xl' => 800    
        ];
    
    public function processUpload($imageFile)
    {
        $extension = $imageFile->getClientOriginalExtension();
        $this->filename = $this->cleanString($imageFile->getClientOriginalName().'-'.rand(10000,99999));

        list($width, $height, $imgtype, $attr) = getimagesize($imageFile);

        //load image to memory
        switch (strtolower($extension)) {
            case 'bmp' :
                $im = imageCreateFromGif($imageFile);
            break;
            case 'jpg' :
            case 'jpeg' :
                $im = imageCreateFromJpeg($imageFile);
            break;
            case 'png' :
                $im = imageCreateFromPng($imageFile);
            break;
            case 'bmp' :
                $im = imageCreateFromBmp($imageFile);
            break;
            default:
                return false;
        }

        //save original
        imagejpeg($im, \Config::get('app.image_path') . $this->filename . '.jpg');

        //generate various sizes
        foreach ($this->scaled_sizes AS $name => $size) {
            if ($width > $height) {
                $dim = min($size, $width);
                $resized_image = imagescale(
                    $im,
                    $dim
                );
            } else {
                $dim = min($size, $height);
                $resized_image = imagescale(
                    $im,
                    $width * ($dim/$height),
                    $dim
                );
            }
            imagejpeg($resized_image, \Config::get('app.image_path') . $this->filename . '-'.$name. '.jpg');
            imagedestroy($resized_image);
        }
        
        imagedestroy($im);
    }

    //creates clean, web-safe, seo-friendly string
    private function cleanString($string)
    {
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', trim($string));
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
        return $clean;
    }

    public function delete()
    {

        foreach ($this->scaled_sizes AS $type => $dim) {
            $file = \Config::get('app.image_path') . $this->filename . '-'.$type. '.jpg';
            @unlink($file);
        }
        @unlink(\Config::get('app.image_path') . $this->filename . '.jpg');
        
        parent::delete();
    }


    /** Relationships **/

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
   
}
