<?php
class Blog extends Eloquent{
	protected $table = 'blog';

	public function comment(){
		return $this->hasMany('Comment');
	}

	public function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('#[^\\pL\d]+#u', '-', $text);

		// trim
		$text = trim($text, '-');

		// transliterate
		if (function_exists('iconv')) {
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		}

		// lowercase
		$text = strtolower($text);

		// remove unwanted characters
		$text = preg_replace('#[^-\w]+#', '', $text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}

	public function search_results($query)
	{
		$results = $this->where('title', 'LIKE', '%' . $query . '%')
			->orWhere('body', 'LIKE', '%' . $query . '%')
			->orWhere('author', 'LIKE', '%' . $query . '%')
			->orWhere('tags', 'LIKE', '%' . $query . '%')->get();
		return $results;
	}
	
}