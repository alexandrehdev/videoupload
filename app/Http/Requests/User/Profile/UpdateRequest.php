<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => [
                "required",
                function($attribute, $value, $fail) {
                    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

                    if(preg_match('~[0-9]+~', $value)){
                        $fail("Caracteres NUMÉRICOS para o NOME é inválido");
                    }

                    if(preg_match($pattern, $value)){
                       $fail("O nome pessoal NÃO PODERÁ conter CARACTERES ESPECIAIS.");
                    }
                }
            ],
            'email' => [
                'email'
            ],
            'password' => [
                "confirmed",
                "sometimes",
                "min:6"
            ]
        ];
    }


    public function messages(): array
    {
        return [
            "name.required" => "O campo de nome e obrigatorio",
            // "email.required" => "O campo  email é obrigatório",
            "email.email" => "O email fornecido não é válido",
            "password.min" => "A senha deve ter no mínimo 6 caracteres",
            "password.confirmed" => "As senhas informadas são diferentes"
        ];
    }
}
