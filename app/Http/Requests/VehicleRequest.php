<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->isMethod('POST')){
            $data = [
                'name' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                'type' => 'required',
                'merk' => 'required',
                'license_plat' => 'required',
            ];
        }elseif(request()->isMethod('PUT')){
            $data = [
                'name' => 'required',
                'image' => 'mimes:png,jpg,jpeg|max:2048',
                'type' => 'required',
                'merk' => 'required',
                'license_plat' => 'required',
            ];
        }

        return $data;
    }
}
