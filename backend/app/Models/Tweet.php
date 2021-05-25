<?php

namespace App\Models\Tweet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'tweets';
    
    // 可変項目
    protected $fillable =
    [
        'text',
        'image_path'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
