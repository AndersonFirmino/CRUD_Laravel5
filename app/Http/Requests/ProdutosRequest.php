<?php

namespace estoque\Http\Requests;

use estoque\Http\Requests\Request;

class ProdutosRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    //Autorizar ou não o usuario a fazer reqisições.
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //Regras de validação.
    public function rules()
    {
        return [
            'nome' => 'required|max:100',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric',
            'quantidade' => 'required'
        ];
    }

    //Mensagens de validação, caso não esteha usando mensagens personalizadas pelo validation
    //esta mensagem ira se aplicar para todos os que estiverem no método rules acima.
    // public function messages(){
    //     return ['required' => 'O campo :attribute não pode ser enviado vazio.'];
    // }

}
