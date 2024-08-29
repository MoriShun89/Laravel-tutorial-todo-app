<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditTask extends CreateTask
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = parent::rules();
        $status_rule = Rule::in(array_keys(Task::STATUS));

        return $rule + [
            'status' => 'required|' . $status_rule,
        ];
    }

    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態',
        ];
    }

    public function messages()
    {
        $messages = parent::messages();

        // Task::STATUSのlabelの配列を作成
        // $status_labels = ['未着手', '着手中', '完了']
        $status_labels = array_map(fn ($item) => $item['label'], Task::STATUS);
        // ['未着手', '着手中', '完了']の配列を展開し、指定の区切り文字'、'で結合した文字列を作成
        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attributeには' . $status_labels . 'のいずれかを指定してください。'
        ];
    }
}
