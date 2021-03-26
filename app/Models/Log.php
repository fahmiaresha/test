<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * 
 * @property int $ID_USER_LOG
 * @property int $ID_JABATAN_LOG
 * @property int $ID_PEGAWAI
 * 

 *
 * @package App\Models
 */
class Log extends Model
{
	protected $table = 'log';
	protected $primaryKey = 'ID_USER_LOG';

	protected $fillable = [
    	'ID_USER_LOG',
    	'ID_JABATAN_LOG',
    	'ID_PEGAWAI'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_USER_LOG');
	}


}
