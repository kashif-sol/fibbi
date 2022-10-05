<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'product_identifier', 'google_id','btn_postition','btn_postition2','btn_postition3','css',
    ];}
