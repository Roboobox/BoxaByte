<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Scalar\MagicConst\Dir;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'name',
        'size',
        'directory_id'
    ];

    public function directory()
    {
        return $this->belongsTo(Directory::class);
    }
}
