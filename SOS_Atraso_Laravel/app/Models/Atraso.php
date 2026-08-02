<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Atraso extends Model { protected $table='sosatraso'; public $timestamps=false; protected $fillable=['nome','turma','motivo','data']; protected $casts=['data'=>'datetime']; }