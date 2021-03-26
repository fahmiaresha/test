<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Kotum
 * 
 * @property string $KODE_KOTA
 * @property string $KODE_PROVINSI
 * @property string $NAMA_KOTA
 * 
 * @property Provinsi $provinsi
 *
 * @package App\Models
 */
class Kotum extends Model
{
	protected $table = 'kota';
	protected $primaryKey = 'KODE_KOTA';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'KODE_PROVINSI',
		'NAMA_KOTA'
	];

	public function provinsi()
	{
		return $this->belongsTo(Provinsi::class, 'KODE_PROVINSI');
	}
}
