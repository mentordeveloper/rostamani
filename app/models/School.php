<?php

class School extends \Eloquent {
	protected $fillable = [];

    protected $table = 'stores';

    public static function updateSchool($schoolId, $status) {
        
//        $this->update(array('status'=>$status));
        DB::table('stores')
                ->where('id', $schoolId)
                ->update(array('status' => $status));
        DB::table('users')
                ->where('s_id', $schoolId)
                ->update(array('is_active' => $status));
    }
    public static function updateSchoolOnDelete($schoolId, $status) {

        DB::table('users')
                ->where('s_id', $schoolId)
                ->update(array('is_active' => $status));
    }
    public static function updateDriverOnSchoolDelete($schoolId, $status) {

        DB::table('drivers')
                ->where('s_id', $schoolId)
                ->update(array('is_active' => $status));
    }

}