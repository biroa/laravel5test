<?php namespace App\Http\Requests;

class GalleryRequest extends Request
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
            //
            'name' => 'required|min:3|max:150',
            'category_id' => 'required|integer',
            'thumbnail' => 'mimes:jpeg,bmp,png,jpg,JPG',
            'lg_width' => 'integer|required',
            'lg_height' => 'integer|required',
            'm_width' => 'integer|required',
            'm_height' => 'integer|required',
            'sm_width' => 'integer|required',
            'sm_height' => 'integer|required',
        ];
    }

}
