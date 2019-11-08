<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\VerificarCep;
use App\Rules\TipoImovelRule;

class ImovelRequest extends FormRequest
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
        return 
        [
            'nome_proprietario' => 'required',
           'endereco' => 'required',
           'bairro' => 'required',
           'municipio' => 'required',
           'estado' => 'required|min:2|max:2',
           'cep' => ['required', new VerificarCep],
           'tipo_imovel' => ['required', new TipoImovelRule]
        ];
    }

    public function messages()
    {
        return 
        [
            'nome_proprietario:required' => 'nome do proprietário obrigatório',
            'endereco.required' => 'campo endereço é obrigatório',
            'bairro.required' => 'campo bairro é obrigatório',
            'municipio.required' => 'campo municipio é obrigatório',
            'estado.required' => 'campo Estado é obrigatório',
            'estado.min' => 'mínimo de dois caracteres',
            'estado.max' => 'máximo de dois caracteres',
            'cep.required' => 'Cep obrigatório',
            'tipo_imovel.required' => 'Tipo de imóvel obrigatório',
        ];
    }

}
