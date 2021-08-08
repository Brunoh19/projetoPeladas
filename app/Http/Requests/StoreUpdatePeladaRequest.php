<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePeladaRequest extends FormRequest
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
        $id = $this->segment(4);

        return [
            'nome' => 'required|min:3|max:50|unique:peladas,nome,{$id},id',
            'data' => 'required',
            'horario' => "required",
            'local' => "required|min:3|max:255",
        ];
    }
}
