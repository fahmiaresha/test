<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProsesProduksi
 * 
 * @property int $KODE_PRODUKSI
 * @property int $KODE_PENGAMBILAN_BAHAN_BAKU
 * @property Carbon $TGL_PRODUKSI
 * @property float|null $HASIL_BAGUS_KG
 * @property float|null $HASIL_RUSAK_KG
 * @property string|null $EVALUASI_PRODUCT
 * @property string|null $EVALUASI_MESIN
 * @property string|null $EVALUASI_BAHAN_BAKU
 * 
 * @property PengambilanBahanBaku $pengambilan_bahan_baku
 * @property Collection|HasilProduct[] $hasil_products
 *
 * @package App\Models
 */
class ProsesProduksi extends Model
{
	protected $table = 'proses_produksi';
	protected $primaryKey = 'KODE_PRODUKSI';

	protected $casts = [
		'KODE_PENGAMBILAN_BAHAN_BAKU' => 'int',
		'HASIL_BAGUS_KG' => 'float',
		'HASIL_RUSAK_KG' => 'float',
	];

	protected $dates = [
		'TGL_PRODUKSI'
	];

	protected $fillable = [
		'KODE_PENGAMBILAN_BAHAN_BAKU',
		'TGL_PRODUKSI',
		'HASIL_BAGUS_KG',
		'HASIL_RUSAK_KG',
		'EVALUASI_PRODUCT',
		'EVALUASI_MESIN',
		'EVALUASI_BAHAN_BAKU'
	];

	public function pengambilan_bahan_baku()
	{
		return $this->belongsTo(PengambilanBahanBaku::class, 'KODE_PENGAMBILAN_BAHAN_BAKU');
	}

	public function hasil_product()
	{
		return $this->hasOne(HasilProduct::class, 'KODE_PRODUKSI');
	}
}
