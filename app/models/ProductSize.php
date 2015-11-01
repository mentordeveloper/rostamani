<?php

class ProductSize extends \Eloquent {

    protected $fillable = [];
    protected $table = 'products_size';
    /*
     * Update Size Status on all parent and child
     * @function updateSizeStatus
     * @parem int sizeId size table autoincremental id
     * @param int status size status
     * @author Umair Majeed (mentordeveloper)
     */
    public static function updateSizeStatus($sizeId, $status) {

        DB::table('products_size')
                ->where('is_parent', $sizeId)
                ->orWhere('id', $sizeId)
                ->update(array('status' => $status));
    }
    
    /*
     * Delete Size record for all relation parent and child
     * @function deleteSize
     * @parem int sizeId size table autoincremental id
     * @author Umair Majeed (mentordeveloper)
     */
    public static function deleteSize($sizeId) {

        DB::table('products_size')
                ->where('is_parent', $sizeId)
                ->orWhere('id', $sizeId)
                ->delete();
    }
    /*
     * Delete Size record for all relation parent and child
     * @function deleteSubSize
     * @parem int parentId size table autoincremental id
     * @parem int sizeId size table autoincremental id
     * @author Umair Majeed (mentordeveloper)
     */
    public static function deleteSubSize($parentId, $sizeId) {

        DB::table('products_size')
                ->where('id', $sizeId)
                ->delete();
    }
    

}
