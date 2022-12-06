<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;
    use HasFactory;

    

    //logikanya tidak membatasi apa yg msk ke dalam database
    protected $guarded = [];
    
    public $timestamps=false;
    protected $primaryKey="id_aut";
    protected $datetimes=['deleted_at'];
}
