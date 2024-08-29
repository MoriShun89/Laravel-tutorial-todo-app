<?php

return [
    'required' => ':attribute は必須です。',
    'max' => [
        'string'  => ':attribute は :max 文字以内で入力してください。',
    ],
    'date' => ':attributeには日付を入力してください。',
    'confirmed' => ':attribute が確認欄と一致していません。',
    'email' => ':attribute には有効な形式のメールアドレスを入力してください。',
    'min' => [
        'string' => ':attribute は :min 文字以上で入力してください。',
    ],
    'string' => ':attribute には文字を入力してください。',
    'unique' => ':attribute はすでに使用されています。',
    'attributes' => [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'token' => 'トークン',
    ],
];
