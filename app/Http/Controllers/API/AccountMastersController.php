<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Models\AccountMaster; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\User;

class AccountMastersController extends Controller 
{
    public $successStatus = 200;

    public function getAccountByAccountNumber(Request $request) {
        $account = DB::connection('sqlsrv2')
            ->table('AccountMaster')
            ->leftJoin('AccountMasterExtension', 'AccountMaster.AccountNumber', '=', 'AccountMasterExtension.AccountNumber')
            ->whereRaw("AccountMaster.AccountNumber='" . $request['acctNo'] . "'")
            ->select(
                'AccountMaster.*',
                'AccountMasterExtension.PoleCode',
                'AccountMasterExtension.ServiceVoltage',
                'AccountMasterExtension.Phase',
                'AccountMasterExtension.PF',
                'AccountMasterExtension.Phasing',
                'AccountMasterExtension.SubstationID',
                'AccountMasterExtension.SDWType',
                'AccountMasterExtension.Item1',
                'AccountMasterExtension.Item2',
                'AccountMasterExtension.Item3',
                'AccountMasterExtension.Item4',
                'AccountMasterExtension.Item5'
            )
            ->first();

        if ($account == null) {
            return response()->json(['error' => 'Account not found!'], 404); 
        } else {
            return response()->json($account, $this->successStatus); 
        }        
    }

    public function updateContactInfo(Request $request) {
        $account = AccountMaster::find($request['AccountNumber']);

        if ($account != null) {
            $account->timestamps = false;
            $account->ContactNumber = $request['ContactNumber'];
            $account->Email = $request['EmailAddress'];
            $account->save();

            $user = User::find($request['UserId']);
            $user->email = $request['EmailAddress']==null ? ' ' : $request['EmailAddress'];            
            $user->save();

            return response()->json(['response' => 'success'], $this->successStatus); 
        } else {
            return response()->json(['error' => 'Internal server error!'], 500); 
        }
    }

}