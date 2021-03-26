<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KonfirmasiPenjualan
 * 
 * @property int $ID_KONFIRMASI_PENJUALAN
 * @property int $KODE_DEPO
 * @property int|null $ID_SALES_B
 * @property Carbon $TGL_KONFIRMASI_PENJUALAN
 * @property int $STATUS_KONFIRMASI_PENJUALAN
 * @property string|null $CATATAN
 * 
 * @property SalesB $sales_b
 * @property DepoAirMinum $depo_air_minum
 * @property Collection|Penjualan[] $penjualans
 *
 * @package App\Models
 */
class KonfirmasiPenjualan extends Model
{
	protected $table = 'konfirmasi_penjualan';
	protected $primaryKey = 'ID_KONFIRMASI_PENJUALAN';

	protected $casts = [
		'KODE_DEPO' => 'int',
		'ID_SALES_B' => 'int',
		'STATUS_KONFIRMASI_PENJUALAN' => 'int'
	];

	protected $dates = [
		'TGL_KONFIRMASI_PENJUALAN'
	];

	protected $fillable = [
		'KODE_DEPO',
		'ID_SALES_B',
		'TGL_KONFIRMASI_PENJUALAN',
		'STATUS_KONFIRMASI_PENJUALAN',
		'CATATAN'
	];

	public function sales_b()
	{
		return $this->belongsTo(SalesB::class, 'ID_SALES_B');
	}

	public function depo_air_minum()
	{
		return $this->belongsTo(DepoAirMinum::class, 'KODE_DEPO');
	}

	public function penjualans()
	{
		return $this->hasMany(Penjualan::class, 'ID_KONFIRMASI_PENJUALAN');
	}
}
