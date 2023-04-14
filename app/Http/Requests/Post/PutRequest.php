<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{
    static function myRules()
    {

     /*   return [
        "title"=>"required|min:5|max:100",
        "slug"=>"required|min:5|max:500|unique:posts,slug,".$this->route("post")->id,
        "content"=>"required|min:7",
        "category_id"=>"required|integer",
        "description"=>"required|min:7",
        "posted"=>"required"
       ]; */
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        //dd($this->route("post")->id);
       /*  return $this->myRules(); */
        return [
            "title"=>"required|min:5|max:100",
            "slug"=>"required|min:5|max:500|unique:posts,slug,".$this->route("post")->id,
            "content"=>"required|min:7",
            "category_id"=>"required|integer",
            "description"=>"required|min:7",
            "posted"=>"required",
            "image"=>"mimes:jpeg,jpg,png|max:10240"
        ];
    }
}
