<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardSimsRequest extends FormRequest
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
      'line_phone' => 'min:8|max:15|required|unique:card_sims',
      'cod_sim' => 'min:20|max:20|required|unique:card_sims',
      'sim_deposito_id' => 'required'
    ];
  }

  public function messages()
  {
    return [
      'cod_sim.min' => 'El código de una SIM tiene 20 digitos.',
      'cod_sim.max'  => 'El código de una SIM tiene 20 digitos.',
      'cod_sim.required'  => 'Este campo es requerido.',
      'cod_sim.unique'  => 'Ya existe una SIM con ese código.',

      'line_phone.min'  => 'Tiene menos de 8 digitos.',
      'line_phone.max'  => 'Tiene mas de 15 digitos.',
      'line_phone.required'  => 'Este campo es requerido.',
      'line_phone.unique'  => 'Ya existe una SIM con ese número.',
      
      'sim_deposito_id.required'  => 'El deposito es requerido.',
    ];
  }
}
