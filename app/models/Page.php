<?php
use Illuminate\Support\Facades\URL;

/**
 * Page
 * @property-read \User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 */
class Page extends Eloquent {
	protected $fillable = [];
	protected $table = 'pages';

  

  /**
   * Deletes a page and all
   * the associated comments.
   *
   * @return bool
   */
  public function delete() {

    // Delete the page
    return parent::delete();
  }

  /**
   * Returns a formatted page content entry,
   * this ensures that line breaks are returned.
   *
   * @return string
   */
  public function content() {
    return nl2br($this->description);
  }

  /**
   * Get the page's author.
   *
   * @return User
   */
  public function author() {
    return $this->belongsTo('User', 'user_id');
  }
  /**
   * Get the page's Parent Category.
   *
   * @return User
   */
  public function catName() {
    return $this->belongsTo('categories', 'cat_id');
  }

  /**
   * Get the page's comments.
   *
   * @return array
   */
  public function comments() {
    return $this->hasMany('Comment');
  }

  /**
   * Get the date the page was created.
   *
   * @param \Carbon|null $date
   * @return string
   */
  public function date($date = null) {
    if (is_null($date)) {
      $date = $this->created_at;
    }

    return String::date($date);
  }

  /**
   * Get the URL to the page.
   *
   * @return string
   */
  public function url() {
    return Url::to($this->slug);
  }

  /**
   * Returns the date of the page creation,
   * on a good and more readable format :)
   *
   * @return string
   */
  public function created_at() {
    return $this->date($this->created_at);
  }

  /**
   * Returns the date of the page last update,
   * on a good and more readable format :)
   *
   * @return string
   */
  public function updated_at() {
    return $this->date($this->updated_at);
  }

//  protected function setDateFormat()
//    {
//        return 'd/m/Y';
//    }
//  protected function getDateFormat()
//    {
//        return 'U';
//    }
}