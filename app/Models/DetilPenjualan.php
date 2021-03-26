<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetilPenjualan
 * 
 * @property int $ID_PENJUALAN
 * @property int $KODE_PRODUCT
 * @property int $JUMLAH_SAK
 * @property int $JUMLAH_PCS
 * @property float $HARGA_BARANG
 * 
 * @property Product $product
 * @property Penjualan $penjualan
 *
 * @package App\Models
 */
class DetilPenjualan extends Model
{
	protected $table = 'detil_penjualan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PENJUALAN' => 'int',
		'KODE_PRODUCT' => 'int',
		'JUMLAH_SAK' => 'int',
		'JUMLAH_PCS' => 'int',
		'HARGA_BARANG' => 'float'
	];

	protected $fillable = [
		'JUMLAH_SAK',
		'JUMLAH_PCS',
		'HARGA_BARANG'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'KODE_PRODUCT');
	}

	public function penjualan()
	{
		return $this->belongsTo(Penjualan::class, 'ID_PENJUALAN');
	}
}
