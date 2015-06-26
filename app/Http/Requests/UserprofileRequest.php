<?php namespace App\Http\Requests;

class UserprofileRequest extends Request
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
            'first_name' => 'required|min:3|max:100',
            'last_name' => 'required|min:3|max:100',
            'gender' => 'required|integer',
            'contact_email' => 'required|email|max:150',
            'mobile_phone' => 'required|min:3',
            'address' => 'required|min:5|max:150',
            'city' => 'required|min:3|max:150',
            'county' => 'required|min:3|max:150',
            'state' => 'required|min:3|max:150'
        ];
    }

}
