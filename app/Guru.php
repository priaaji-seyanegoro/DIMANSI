<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
     protected $table = 'guru';
     protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','gelar','agama','alamat','user_id'];
}
