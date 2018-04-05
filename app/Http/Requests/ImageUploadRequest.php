<?php namespace App\Http\Requests;
use App\Http\Requests\Request;

class ImageUploadRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * The validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {     
        $rules = [
            'images' => 'required'
        ];
        $images = count($this->input('images'));
        foreach(range(0, $images) as $index) {
            $rules['images.' . $index] = 'image|mimes:jpeg,bmp,png,gif,svg|max:30000';
        }
        return $rules;
    }
}