<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateJogadorRequest extends FormRequest
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
            'nome' => 'required|min:3|max:50|unique:jogadores,nome,{$id},id',
            'email' => 'required|max:255|unique:jogadores,email,{$id},id',
            'apelido' => "required|min:3|max:30",
            'senha' => "required|min:3|max:15",
        ];
    }
}
