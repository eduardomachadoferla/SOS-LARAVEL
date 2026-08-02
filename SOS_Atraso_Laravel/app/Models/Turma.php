<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Turma extends Model { protected $table='turmas'; protected $primaryKey='id'; public $incrementing=false; protected $keyType='string'; public $timestamps=false; protected $fillable=['id','turma']; }