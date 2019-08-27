<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','alamat','avatar','user_id','nomer'];

    public function getAvatar()
        {
        	if(!$this->avatar){
        		return asset('img/default.png');
        	}
        	
        		return asset('images/'.$this->avatar);
        }
    public function mapel(){
    	return $this ->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}