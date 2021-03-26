<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Penjualan
 * 
 * @property int $ID_PENJUALAN
 * @property int $ID_MANAJER_MARKETING
 * @property int $ID_KONFIRMASI_PENJUALAN
 * @property int|null $ID_SALES_B
 * @property Carbon $TGL_PENJUALAN
 * @property Carbon $TGL_KIRIM
 * @property string $METODE_KIRIM
 * @property int $ONGKOS_KIRIM
 * @property int $TOTAL_PENJUALAN
 * @property int $STATUS_PENJUALAN
 * 
 * @property ManajerMarketing $manajer_marketing
 * @property SalesB $sales_b
 * @property KonfirmasiPenjualan $konfirmasi_penjualan
 * @property Collection|DetilPenjualan[] $detil_penjualans
 * @property Collection|PembayaranPenjualan[] $pembayaran_penjualans
 *
 * @package App\Models
 */
class Penjualan extends Model
{
	protected $table = 'penjualan';
	protected $primaryKey = 'ID_PENJUALAN';

	protected $casts = [
		'ID_MANAJER_MARKETING' => 'int',
		'KODE_DEPO' => 'int',
		'ID_SALES_B' => 'int',
		'ONGKOS_KIRIM' => 'int',
		'TOTAL_PENJUALAN' => 'int',
		'STATUS_PENJUALAN' => 'int'
	];

	protected $dates = [
		'TGL_PENJUALAN',
		'TGL_KIRIM'
	];

	protected $fillable = [
		'ID_MANAJER_MARKETING',
		'KODE_DEPO',
		'ID_SALES_B',
		'TGL_PENJUALAN',
		'TGL_KIRIM',
		'METODE_KIRIM',
		'ONGKOS_KIRIM',
		'TOTAL_PENJUALAN',
		'STATUS_PENJUALAN'
	];

	public function manajer_marketing()
	{
		return $this->belongsTo(ManajerMarketing::class, 'ID_MANAJER_MARKETING');
	}

	public function sales_b()
	{
		return $this->belongsTo(SalesB::class, 'ID_SALES_B');
	}

	public function depo_air_minum()
	{
		return $this->belongsTo(DepoAirMinum::class, 'KODE_DEPO');
	}

	public function detil_penjualans()
	{
		return $this->hasMany(DetilPenjualan::class, 'ID_PENJUALAN');
	}

	public function pembayaran_penjualans()
	{
		return $this->hasOne(PembayaranPenjualan::class, 'ID_PENJUALAN');
	}
}
