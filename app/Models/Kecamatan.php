<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    //
    use HasFactory;
    protected $table='kecamatan';
    protected $fillable=['name','alt_name','latitude','longitude','kabkota_id'];
    function provinsi(){
        return $this->belongsTo(Kabkota :: class);
    }
    
   

};