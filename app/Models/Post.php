<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'content', 'category', 'status'])]

class Post extends Model {}
