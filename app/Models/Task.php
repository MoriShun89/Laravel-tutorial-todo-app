<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * 状態定義
     */
    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'bg-danger'],
        2 => ['label' => '着手中', 'class' => 'bg-info'],
        3 => ['label' => '完了', 'class' => ''],
    ];


    /**
     * 状態のラベル
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていない場合空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    /**
     * 状態を表すHTMLクラス
     * @return string
     */
    public function getStatusClassAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていない場合空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    /**
     * 整形した期日日
     * @return string
     */
    public function getFormattedDueDateAttribute()
    {
        $formattedDueDate = Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('Y/m/d');
        return $formattedDueDate;
    }
}
