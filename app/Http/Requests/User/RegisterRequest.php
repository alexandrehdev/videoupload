<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            ],
            'email' => [
                "required",
                "email",
                "unique:users,email"
            ],
            'password' => [
                "required",
                "min:6",
                "confirmed"
            ],
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "O campo de nome e obrigatorio",
            "email.required" => "O campo  email é obrigatório",
            "email.email" => "O email fornecido não é válido",
            "email.unique" => "Este email já está em uso por outro usuário",
            "password.required" => "A senha é um campo obrigatório",
            "password.min" => "A senha deve ter no mínimo 6 caracteres",
            "password.confirmed" => "As senhas informadas são diferentes"
        ];
    }
}
