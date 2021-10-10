<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'lesson_id',
        'name',
        'type',
        'logo_path',
        'file_path',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'document_users', 'document_id', 'user_id')->withPivot('lesson_id')->withTimestamps();
    }
}
