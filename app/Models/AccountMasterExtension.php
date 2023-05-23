<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AccountMasterExtension
 * @package App\Models
 * @version May 23, 2023, 9:33 am PST
 *
 * @property string $PoleCode
 * @property string $ServiceVoltage
 * @property string $Phase
 * @property string $PF
 * @property string $Phasing
 * @property string $SubstationID
 * @property string $SDWType
 * @property string $Item1
 * @property string $Item2
 * @property string $Item3
 * @property string $Item4
 * @property string $Item5
 */
class AccountMasterExtension extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'AccountMasterExtension';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "sqlsrv2";

    public $fillable = [
        'PoleCode',
        'ServiceVoltage',
        'Phase',
        'PF',
        'Phasing',
        'SubstationID',
        'SDWType',
        'Item1',
        'Item2',
        'Item3',
        'Item4',
        'Item5'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'AccountNumber' => 'string',
        'PoleCode' => 'string',
        'ServiceVoltage' => 'string',
        'Phase' => 'string',
        'PF' => 'string',
        'Phasing' => 'string',
        'SubstationID' => 'string',
        'SDWType' => 'string',
        'Item1' => 'string',
        'Item2' => 'string',
        'Item3' => 'string',
        'Item4' => 'string',
        'Item5' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'PoleCode' => 'nullable|string|max:50',
        'ServiceVoltage' => 'nullable|string|max:50',
        'Phase' => 'nullable|string|max:50',
        'PF' => 'nullable|string|max:50',
        'Phasing' => 'nullable|string|max:50',
        'SubstationID' => 'nullable|string|max:50',
        'SDWType' => 'nullable|string|max:50',
        'Item1' => 'nullable|string|max:50',
        'Item2' => 'nullable|string|max:50',
        'Item3' => 'nullable|string|max:50',
        'Item4' => 'nullable|string|max:50',
        'Item5' => 'nullable|string|max:50'
    ];

    
}
