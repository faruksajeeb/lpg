<?php

namespace App;

use DB;
use Illuminate\Support\Facades\Auth;

class WebCapsule {

    public function now($param = null) {
        date_default_timezone_set('Asia/Dhaka');
        switch ($param) {
            case 'time':
                return date('h:i:s A');
                break;

            case 'date':
                return date('Y-m-d');
                break;

            default:
                return date('Y-m-d H:i:s');
                break;
        }
    }
    
    public function insertData($table, $data){ 
            $data['created_by'] = Auth::user()->id;
            $data['created_at'] = $this->now();
            $insertId = DB::table($table)->insertGetId($data);
            if ($insertId) {
                $this->auditInsert($insertId, 'insert', $table);
                $message = "$table inserted successfully.";
            }else{
                $message = "ERROR! Something wrong."; 
            }
            return $message;
    }
    
    public function updateInfo($table, $data, $edit_id) {
        $old_data = DB::table($table)->where('id', $edit_id)->first();
        unset($old_data->updated_by, $old_data->updated_at);
        $changed = false;
        foreach ($old_data as $oldKey => $oldVal) {
            if (in_array($oldKey, array_keys($data)) && $oldVal != $data[$oldKey]) {
                $changed = true;
                $auditData[] = array(
                    'ColumnName' => $oldKey,
                    'OldValue' => $oldVal,
                    'NewValue' => $data[$oldKey]
                );
            }
        }
        if ($changed) {
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = $this->now();
            $res = DB::table($table)
                    ->where('id', $edit_id)
                    ->update($data);
            if ($res) {                
                $insertId=$this->auditInsert($edit_id, 'edit', $table);
                foreach ($auditData as $newAuditData => $auditValue) {
                    $auditData[$newAuditData]['AuditTrialID'] = $insertId;
                }
                DB::table('tbl_audit_trial_detail')->insert($auditData);              
                $message = "$table updated successfully.";
            }
        } else {
            $message = "You have no changes.";
        }
        return $message;
    }
    public function deleteItem($table,$id){
       
        $res=DB::table($table)->where('id',$id)->delete();
        if($res){            
            $message = "$table deleted successfully.";
            $this->auditInsert($id,'delete', $table);
        }else{            
            $message = "ERROR! Something Wrong! ";
        }
        return $message;
        
    }
    public function auditInsert($affected_id, $status, $table) {        
        $data = array(
            'AffectedTable' => $table,
            'AffectedDateTime' => $this->now(),
            'UserID' => Auth::user()->id,
            'MachineIP' => $_SERVER['REMOTE_ADDR'],
            'TaskType' => $status,
            'AffectedID' => $affected_id
        );
        $insertId = DB::table('tbl_audit_trial')->insertGetId($data);
        return $insertId; 
    }

}


