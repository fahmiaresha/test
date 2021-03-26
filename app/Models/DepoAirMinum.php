<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DepoAirMinum
 * 
 * @property int $KODE_DEPO
 * @property string $KODE_KOTA
 * @property int $ID_SALES_A
 * @property int $ID_MANAJER_MARKETING
 * @property string $NAMA_CUSTOMER
 * @property string $NAMA_DEPO
 * @property string|null $ALAMAT_DEPO
 * @property string|null $NO_TELP_DEPO
 * @property string|null $EMAIL_DEPO
 * 
 * @property IndonesiaCity $indonesia_city
 * @property SalesA $sales_a
 * @property Collection|KonfirmasiPenjualan[] $konfirmasi_penjualans
 *
 * @package App\Models
 */
class DepoAirMinum extends Model
{
	protected $table = 'depo_air_minum';
	protected $primaryKey = 'KODE_DEPO';

	protected $casts = [
		'ID_SALES_A' => 'int'
	];

	protected $fillable = [
		'KODE_KOTA',
		'ID_SALES_A',
		'ID_MANAJER_MARKETING',
		'NAMA_CUSTOMER',
		'NAMA_DEPO',
		'ALAMAT_DEPO',
		'NO_TELP_DEPO',
		'EMAIL_DEPO'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function sales_a()
	{
		return $this->belongsTo(SalesA::class, 'ID_SALES_A');
	}

	public function manajer_marketing()
	{
		return $this->belongsTo(ManajerMarketing::class, 'ID_MANAJER_MARKETING');
	}

	public function konfirmasi_penjualans()
	{
		return $this->hasMany(KonfirmasiPenjualan::class, 'KODE_DEPO');
	}
}
