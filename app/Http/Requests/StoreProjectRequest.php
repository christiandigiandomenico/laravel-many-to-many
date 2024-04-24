<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'unique:projects,name|max:255|required',
            'description' => 'required',
            'cover_image' => 'file|max:1024|nullable|mimes:jpg,bmp,png',
            'thumbnail' => 'nullable',
            'technologies' => 'required',
            'link' => 'required',
            'type_id' => 'nullable|exists:types,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => "È già presente un post con lo stesso titolo",
            'name.max' => "Il titolo deve avere massimo :max caratteri",
            'name.required' => 'Devi inserire un titolo',
            'description.required' => 'Devi inserire una descrizione',
            'cover_image.mimes' => "Il file deve essere un'immagine",
            'cover_image.max' => "La dimensione del file non deve superare i 1024 KB",
            'technologies.required' => 'Devi inserire le tecnologie usate',
            'link' => 'Devi inserire il link del progetto'
        ];
    }
}
