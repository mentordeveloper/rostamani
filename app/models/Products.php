<?php

class Products extends \Eloquent {
	protected $fillable = [];
        protected $table = 'products';
        
        
  /**
   * Deletes a Product and all
   * the associated comments.
   *
   * @return bool
   */
  public function delete() {

    // Delete the Product
    return parent::delete();
  }

  /**
   * Returns a formatted Product content entry,
   * this ensures that line breaks are returned.
   *
   * @return string
   */
  public function content() {
    return nl2br($this->description);
  }

  /**
   * Get the Products author.
   *
   * @return User
   */
  public function author() {
    return $this->belongsTo('User', 'user_id');
  }
  /**
   * Get the Products Parent Category.
   *
   * @return User
   */
  public function catName() {
    return $this->belongsTo('categories', 'cat_id');
  }

  /**
   * Get the Products comments.
   *
   * @return array
   */
  public function comments() {
    return $this->hasMany('Comment');
  }

  /**
   * Get the date the Product was created.
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
   * Get the URL to the Product.
   *
   * @return string
   */
  public function url() {
    return Url::to($this->slug);
  }

  /**
   * Returns the date of the Product creation,
   * on a good and more readable format :)
   *
   * @return string
   */
  public function created_at() {
    return $this->date($this->created_at);
  }

  /**
   * Returns the date of the Product last update,
   * on a good and more readable format :)
   *
   * @return string
   */
  public function updated_at() {
    return $this->date($this->updated_at);
  }

}