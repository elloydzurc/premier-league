<?php
/**
 * Created by PhpStorm.
 * User: Elloyd Cruz
 * Date: 9/11/2019
 * Time: 10:16 AM
 */

namespace App\Modules\Importer\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PlayerDetailsRequest
 * @package App\Modules\Importer\Requests
 */
class PlayerDetailsRequest extends FormRequest
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
            'id' => 'required|numeric|exists:players,id'
        ];
    }

    /**
     * Custom validation error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'Player Id is required.',
            'id.numeric' => 'Player Id must be numeric.',
            'id.exists' => 'Player not found.',
        ];
    }
}
