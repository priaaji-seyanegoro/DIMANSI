<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode','nama'];

    public function siswa()
	{
	return $this ->belongsToMany(Siswa::class);
	}
	public function user(){
		return $this ->belongsToMany(User::class);
	}

}