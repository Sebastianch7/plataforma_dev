<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
	protected $fillable = [
  'name','lastname','idTypeDocument','idNumber','mail','phone','mobile','address','postulate','idDepartament','idCity','idCompany','idService','idUser','idState'
  ];
}