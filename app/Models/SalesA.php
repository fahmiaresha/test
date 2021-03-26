<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesA
 * 
 * @property int $ID_SALES_A
 * @property string $KODE_KOTA
 * @property string $NAMA_SALES_A
 * @property string $ALAMAT_SALES_A
 * @property int $JENIS_KELAMIN_SALES_A
 * @property string $NO_TELP_SALES_A
 * @property string|null $EMAIL_SALES_A
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Collection|DepoAirMinum[] $depo_air_minums
 * @property Collection|EvaluasiKinerjaSalesa[] $evaluasi_kinerja_salesas
 *
 * @package App\Models
 */
class SalesA extends Model
{
	protected $table = 'sales_a';
	protected $primaryKey = 'ID_SALES_A';

	protected $casts = [
		'JENIS_KELAMIN_SALES_A' => 'int'
	];

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_SALES_A',
		'ALAMAT_SALES_A',
		'JENIS_KELAMIN_SALES_A',
		'NO_TELP_SALES_A',
		'EMAIL_SALES_A'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function depo_air_minums()
	{
		return $this->hasMany(DepoAirMinum::class, 'ID_SALES_A');
	}

	public function evaluasi_kinerja_salesas()
	{
		return $this->hasMany(EvaluasiKinerjaSalesa::class, 'ID_SALES_A');
	}

	public function getid_user()
	{
		return Log::where([
			'ID_PEGAWAI' => $this->ID_SALES_A,
			'ID_JABATAN_LOG' => 4,
		])->value('ID_USER_LOG');
	}
}
