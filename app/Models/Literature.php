<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Literature extends Model
{
    
    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];
    public $timestamps=false;
    protected $primaryKey="id_lit";
    protected $datetimes=['deleted_at'];


}
