<?php
namespace App\Http\Requests;

class CompanyCreateRequest extends Request
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
            'name' => 'required',
            'tel_no' => 'required',
            'registered_office_address' => 'required',
        ];
    }
}
