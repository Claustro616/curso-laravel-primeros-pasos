<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => str($this->title)->slug()
        ]);
    }
    static function myRules()
    {
       return [
        "title"=>"required|min:5|max:100",
        "slug"=>"required|min:5|max:500|unique:posts"
       ];
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
        return $this->myRules();
       /*  return [
            "title"=>"required|min:5|max:100",
            "slug"=>"required|min:5|max:100",
            "content"=>"required|min:7",
            "category_id"=>"required|integer",
            "description"=>"required|min:7",
            "posted"=>"required"
        ]; */
    }
}
