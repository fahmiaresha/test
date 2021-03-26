<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EvaluasiKinerjaSalesa
 * 
 * @property int $ID_EVALUASI_KINERJA_SALESA
 * @property int $ID_MANAJER_MARKETING
 * @property int $ID_SALES_A
 * @property Carbon $TGL_EVALUASI_KINERJA_SALESA
 * @property string $EVALUASI_SALESA
 * 
 * @property ManajerMarketing $manajer_marketing
 * @property SalesA $sales_a
 *
 * @package App\Models
 */
class EvaluasiKinerjaSalesa extends Model
{
	protected $table = 'evaluasi_kinerja_salesa';
	protected $primaryKey = 'ID_EVALUASI_KINERJA_SALESA';

	protected $casts = [
		'ID_MANAJER_MARKETING' => 'int',
		'ID_SALES_A' => 'int'
	];

	protected $dates = [
		'TGL_EVALUASI_KINERJA_SALESA'
	];

	protected $fillable = [
		'ID_MANAJER_MARKETING',
		'ID_SALES_A',
		'TGL_EVALUASI_KINERJA_SALESA',
		'EVALUASI_SALESA'
	];

	public function manajer_marketing()
	{
		return $this->belongsTo(ManajerMarketing::class, 'ID_MANAJER_MARKETING');
	}

	public function sales_a()
	{
		return $this->belongsTo(SalesA::class, 'ID_SALES_A');
	}
}
