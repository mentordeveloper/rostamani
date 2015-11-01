<?php

/**
 * Comment
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $post_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $author
 * @property-read \Post $post
 * @property-read \User $user
 */
class Comment extends Eloquent {

	/**
	 * Get the comment's content.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->content);
	}

	/**
	 * Get the comment's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the comment's post's.
	 *
	 * @return Blog\Post
	 */
	public function page() {
		return $this->belongsTo('Page');
    }

    /**
     * Get the page's author.
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    /**
     * Get the date the page was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

    /**
     * Returns the date of the blog page creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return $this->date($this->created_at);
    }

    /**
     * Returns the date of the blog page last update,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function updated_at()
    {
        return $this->date($this->updated_at);
    }
}
