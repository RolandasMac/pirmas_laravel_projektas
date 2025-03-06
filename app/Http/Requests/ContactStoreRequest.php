<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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

            'name'    => ['required', 'string', 'max:25', 'min:3'],
            'email'   => ['required', 'email', 'unique:contacts,email'],
            'phone'   => ['required', 'string'],
            'message' => ['required', 'string', 'max:255', 'min:5'],
        ];
    }
    // Custom messages!!!!!!!!!!
    public function messages()
    {
        return [
            'name.required'    => 'Vardo laukelis yra privalomas.',
            'name.max'         => 'Vardas negali būti ilgesnis nei 25 simboliai.',
            'name.min'         => 'Vardas turi būti bent 3 simbolių ilgio.',

            'email.required'   => 'El. pašto laukelis yra privalomas.',
            'email.email'      => 'Įveskite galiojantį el. pašto adresą.',
            'email.unique'     => 'Toks el. paštas jau yra duomenų bazėje!',

            'phone.required'   => 'Telefono numerio laukelis yra privalomas.',

            'message.required' => 'Žinutės laukelis yra privalomas.',
            'message.max'      => 'Žinutė negali būti ilgesnė nei 255 simboliai.',
            'message.min'      => 'Žinutė turi būti bent 5 simbolių ilgio.',
        ];
    }
}
