<?php namespace App\Http\Requests;

class CreateArticleRequest extends Request
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
        //We can write the rules in array instead of pipe
        return [
            'title'     => 'required|min:3',
            'body'      => 'required',
            'published_at'  => 'required|date'
        ];
    }

}
