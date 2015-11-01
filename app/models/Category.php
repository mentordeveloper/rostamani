<?php
/**
 * Category
 *
 * @property integer $cat_id
 * @property integer $user_id
 * @property integer $post_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $author
 * @property-read \Post $post
 * @property-read \User $user
 */
class Category extends Eloquent {

  protected $fillable = [];
  protected $table = 'categories';
    /*
     * Update Category Status on all parent and child
     * @function updateCateStatus
     * @parem int cateId cate table autoincremental id
     * @param int status cate status
     * @author Umair Majeed (mentordeveloper)
     */
    public static function updateCateStatus($cateId, $status) {

        DB::table('categories')
                ->where('is_parent', $cateId)
                ->orWhere('id', $cateId)
                ->update(array('is_active' => $status));
    }
    
    /*
     * Delete Cate record for all relation parent and child
     * @function deleteCate
     * @parem int cateId cate table autoincremental id
     * @author Umair Majeed (mentordeveloper)
     */
    public static function deleteCate($cateId) {

        DB::table('categories')
                ->where('is_parent', $cateId)
                ->orWhere('id', $cateId)
                ->delete();
    }
    /*
     * Delete Cate record for all relation parent and child
     * @function deleteSubCate
     * @parem int parentId parentCate table autoincremental id
     * @parem int cateId cate table autoincremental id
     * @author Umair Majeed (mentordeveloper)
     */
    public static function deleteSubCate($parentId, $cateId) {

        DB::table('categories')
                ->where('is_parent', $parentId)
                ->where('id', $cateId)
                ->delete();
    }
}