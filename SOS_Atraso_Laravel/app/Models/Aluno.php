<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Aluno extends Model { protected $table='alunos'; protected $primaryKey='matricula'; public $incrementing=false; protected $keyType='string'; public $timestamps=false; protected $fillable=['matricula','nome','turma']; }