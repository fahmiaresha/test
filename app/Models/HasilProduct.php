<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HasilProduct
 * 
 * @property int $KODE_HASIL_PRODUCT
 * @property int $KODE_PRODUKSI
 * @property int $KODE_PRODUCT
 * @property float|null $HASIL_BAGUS_PCS
 * @property float|null $HASIL_RUSAK_PCS
 * 
 * @property Product $product
 * @property ProsesProduksi $proses_produksi
 *
 * @package App\Models
 */
class HasilProduct extends Model
{
	protected $table = 'hasil_product';
	protected $primaryKey = 'KODE_HASIL_PRODUCT';

	protected $casts = [
		'KODE_PRODUKSI' => 'int',
		'KODE_PRODUCT' => 'int',
		'HASIL_BAGUS_PCS' => 'float',
		'HASIL_RUSAK_PCS' => 'float'
	];

	protected $fillable = [
		'KODE_PRODUKSI',
		'KODE_PRODUCT',
		'HASIL_BAGUS_PCS',
		'HASIL_RUSAK_PCS'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'KODE_PRODUCT');
	}

	public function proses_produksi()
	{
		return $this->belongsTo(ProsesProduksi::class, 'KODE_PRODUKSI');
	}
}
