<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * 
 * @property int $ID_SUPPLIER
 * @property string $KODE_KOTA
 * @property string $NAMA_SUPPLIER
 * @property string $ALAMAT_SUPPLIER
 * @property string $NO_TELP_SUPPLIER
 * @property string|null $EMAIL_SUPPLIER
 * 
 * @property IndonesiaCity $indonesia_city
 * @property Collection|PenerimaanBahanBaku[] $penerimaan_bahan_bakus
 *
 * @package App\Models
 */
class Supplier extends Model
{
	protected $table = 'supplier';
	protected $primaryKey = 'ID_SUPPLIER';

	protected $fillable = [
		'KODE_KOTA',
		'NAMA_SUPPLIER',
		'ALAMAT_SUPPLIER',
		'NO_TELP_SUPPLIER',
		'EMAIL_SUPPLIER'
	];

	public function indonesia_city()
	{
		return $this->belongsTo(IndonesiaCity::class, 'KODE_KOTA');
	}

	public function penerimaan_bahan_bakus()
	{
		return $this->hasMany(PenerimaanBahanBaku::class, 'ID_SUPPLIER');
	}
}
