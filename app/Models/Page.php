<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public const IMAGE_UPLOAD_PATH = 'uploads/pages/';
    protected $guarded = ['id'];
}
