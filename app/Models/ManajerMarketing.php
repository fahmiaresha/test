<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManajerMarketing
 * 
 * @property int $ID_MANAJER_MARKETING
 * @property string $KODE_KOTA
 * @property string $NAMA_MANAJER_MARKETING
 * @property string $ALAMAT_MANAJER_MARKETING
 * @property int $JENIS_KELAMIN_MANAJER_MARKETING
 * @property string $NO_TELP_MANAJER_MARKETING
 * @property string|null $EMAIL_MANAJER_MARKETING
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Collection|EvaluasiKinerjaSalesa[] $evaluasi_kinerja_salesas
 * @property Collection|EvaluasiKinerjaSalesb[] $evaluasi_kinerja_salesbs
 * @property Collection|Penjualan[] $penjualans
 *
 * @package App\Models
 */
class ManajerMarketing extends Model
{
	protected $table = 'manajer_marketing';
	protected $primaryKey = 'ID_MANAJER_MARKETING';

	protected $casts = [
		'JENIS_KELAMIN_MANAJER_MARKETING' => 'int'
	];

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_MANAJER_MARKETING',
		'ALAMAT_MANAJER_MARKETING',
		'JENIS_KELAMIN_MANAJER_MARKETING',
		'NO_TELP_MANAJER_MARKETING',
		'EMAIL_MANAJER_MARKETING'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function evaluasi_kinerja_salesas()
	{
		return $this->hasMany(EvaluasiKinerjaSalesa::class, 'ID_MANAJER_MARKETING');
	}

	public function evaluasi_kinerja_salesbs()
	{
		return $this->hasMany(EvaluasiKinerjaSalesb::class, 'ID_MANAJER_MARKETING');
	}

	public function penjualans()
	{
		return $this->hasMany(Penjualan::class, 'ID_MANAJER_MARKETING');
	}

	public function getid_user()
	{
		return Log::where([
			'ID_PEGAWAI' => $this->ID_MANAJER_MARKETING,
			'ID_JABATAN_LOG' => 3,
		])->value('ID_USER_LOG');
	}
}
