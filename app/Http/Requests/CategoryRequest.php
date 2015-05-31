<?php namespace App\Http\Requests;

class CategoryRequest extends Request
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
            'name' => 'required|min:3|max:255',
            'short_lead' => 'required|min:3|max:155',
            'lead' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'body' => 'min:5',
            'lead_img_src' => 'min:5|max:255',

        ];
    }

}
