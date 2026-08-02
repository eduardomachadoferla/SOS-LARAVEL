<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Usuario extends Authenticatable { protected $table='usuarios'; public $timestamps=false; protected $fillable=['nome','email','senha','setor','permissao']; protected $hidden=['senha']; public function getAuthPassword(){return $this->senha;} public function hasPermission(string $p): bool { return $this->setor==='admin'||$this->permissao==='admin'||in_array($p,array_filter(explode(',',$this->permissao))); } }