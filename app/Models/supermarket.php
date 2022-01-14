<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Jenssegers\Mongodb\Eloquent\Model;

class supermarket extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'supermarkets';
}
