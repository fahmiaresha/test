<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesB
 * 
 * @property int $ID_SALES_B
 * @property string $KODE_KOTA
 * @property string $NAMA_SALES_B
 * @property string $ALAMAT_SALES_B
 * @property int $JENIS_KELAMIN_SALES_B
 * @property string $NO_TELP_SALES_B
 * @property string|null $EMAIL_SALES_B
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Collection|EvaluasiKinerjaSalesb[] $evaluasi_kinerja_salesbs
 * @property Collection|KonfirmasiPenjualan[] $konfirmasi_penjualans
 * @property Collection|Penjualan[] $penjualans
 *
 * @package App\Models
 */
class SalesB extends Model
{
	protected $table = 'sales_b';
	protected $primaryKey = 'ID_SALES_B';

	protected $casts = [
		'JENIS_KELAMIN_SALES_B' => 'int'
	];

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_SALES_B',
		'ALAMAT_SALES_B',
		'JENIS_KELAMIN_SALES_B',
		'NO_TELP_SALES_B',
		'EMAIL_SALES_B'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function evaluasi_kinerja_salesbs()
	{
		return $this->hasMany(EvaluasiKinerjaSalesb::class, 'ID_SALES_B');
	}

	public function konfirmasi_penjualans()
	{
		return $this->hasMany(KonfirmasiPenjualan::class, 'ID_SALES_B');
	}

	public function penjualans()
	{
		return $this->hasMany(Penjualan::class, 'ID_SALES_B');
	}

	public function getid_user()
	{
		return Log::where([
			'ID_PEGAWAI' => $this->ID_SALES_B,
			'ID_JABATAN_LOG' => 5,
		])->value('ID_USER_LOG');
	}
}
