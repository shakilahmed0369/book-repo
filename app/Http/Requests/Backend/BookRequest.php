<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        switch ($this->getMethod()) {
            case 'POST': 
                
                return [
                    'book_name'  => 'required|unique:books,book_name',
                    'pdf'        => 'required|mimes:pdf|max:30000',
                    'book_cover' => 'required|image',
                    'featured'   => 'nullable'
                ];
                break;

            default: 
                return [
                    'book_name'  => 'required|unique:books,book_name,' . request()->route('book'),
                    'pdf'        => 'mimes:pdf|max:30000',
                    'book_cover' => 'image',
                    'featured'   => 'nullable'
                ];
                break;
        }
    }
}
