<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
     protected $table = 'guru';
     protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','gelar','agama','alamat','user_id','avatar','nomer','tanggal_lahir'];

      public function getAvatar()
        {
        	if(!$this->avatar){
        		return asset('img/default.png');
        	}
        	
        		return asset('images/'.$this->avatar);
        }

      public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function nama_lengkap(){
        return $this->nama_depan.' '.$this->nama_belakang;
    }
}

