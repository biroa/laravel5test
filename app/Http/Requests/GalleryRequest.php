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
        return false;
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
            'name' => 'required|min:3',
            'thumbnail'=>'required|min:3',
            'lg_width' => 'integer|required|min:3',
            'lg_height' => 'integer|required|min:3',
            'm_width' => 'integer|required|min:3',
            'm_height' => 'integer|required|min:3',
            'sm_width' => 'integer|required|min:3',
            'sm_height' => 'integer|required|min:3',
        ];
    }

}
