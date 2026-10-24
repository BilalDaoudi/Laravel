<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "CIN" => "required|unique:Clients,CIN",
            "Nom" => "required",
            "Prenom" => "required",
            "DateNaissance" => "required|date|before:".\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
            "Nationalite" => "required",
            "Telephone" => "required",
            "Permis" => "required",
        ];
    }
}
