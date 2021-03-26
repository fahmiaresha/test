<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $KODE_PRODUCT
 * @property int $KODE_JENIS_PRODUCT
 * @property string $NAMA_PRODUCT
 * @property float $HARGA_PRODUCT
 * @property int $STOK_PRODUCT
 * 
 * @property JenisProduct $jenis_product
 * @property Collection|DetilPenjualan[] $detil_penjualans
 * @property Collection|HasilProduct[] $hasil_products
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'product';
	protected $primaryKey = 'KODE_PRODUCT';

	protected $casts = [
		'KODE_JENIS_PRODUCT' => 'int',
		'HARGA_PRODUCT' => 'float',
		'STOK_PRODUCT' => 'int'
	];

	protected $fillable = [
		'KODE_JENIS_PRODUCT',
		'NAMA_PRODUCT',
		'HARGA_PRODUCT',
		'STOK_PRODUCT'
	];

	public function jenis_product()
	{
		return $this->belongsTo(JenisProduct::class, 'KODE_JENIS_PRODUCT');
	}

	public function detil_penjualans()
	{
		return $this->hasMany(DetilPenjualan::class, 'KODE_PRODUCT');
	}

	public function hasil_products()
	{
		return $this->hasMany(HasilProduct::class, 'KODE_PRODUCT');
	}
}
