<?php namespace App\Http\Requests;

class ImageRequest extends Request
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:150',
            'descrition' => 'required|min:3',
            'original_img_path' => 'required|min:3',
            'large_img_path' => 'required|min:3',
            'medium_img_path' => 'required|min:3',
            'small_img_path' => 'required|min:3',
            'camera' => 'min:10|max:50',
            'lens' => 'min:10|max:50',
            'focal_lens' => 'min:4||max:50',
            'shutter_speed' => 'min:5|max:50',
            'aperture' => 'min:3|max:50',
            'iso' => 'min:3|max:50',


        ];
    }

}
