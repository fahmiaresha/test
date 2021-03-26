<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Provinsi
 * 
 * @property string $KODE_PROVINSI
 * @property string $NAMA_PROVINSI
 * 
 * @property Collection|Kotum[] $kota
 *
 * @package App\Models
 */
class Provinsi extends Model
{
	protected $table = 'provinsi';
	protected $primaryKey = 'KODE_PROVINSI';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NAMA_PROVINSI'
	];

	public function kota()
	{
		return $this->hasMany(Kotum::class, 'KODE_PROVINSI');
	}
}
