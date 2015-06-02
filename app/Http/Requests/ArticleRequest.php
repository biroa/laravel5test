<?php namespace App\Http\Requests;

class ArticleRequest extends Request
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
            'title' => 'required|min:3|max:255',
            'body' => 'required',
            'published_at' => 'required|date',
            'excerpt' => 'required|min:3|max:150',
            'url' => 'required|min:3'
        ];
    }

}
