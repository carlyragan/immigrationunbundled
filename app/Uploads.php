<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'uploads';

    protected $fillable = [
        'user_id','education_credential_assessment', 'ielts',

    ];
}
