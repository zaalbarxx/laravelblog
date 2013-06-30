<?php
class SidebarComposer{
	private $tags,$latest_comments;
	public function compose($view){
		
		$this->latest_comments = Comment::with('blog')->orderBy('created_at','DESC')->take(3)->get();
		$this->latest_comments = $this->latest_comments();

		$this->tags = Blog::select('tags')->get();
		$this->tags = $this->tags();


		$view->with('tags',$this->tags)->with('latest_comments',$this->latest_comments);
	}


		private function tags(){
			$tags = array();
			foreach ($this->tags as $blogTag) {
				$tags = array_merge(explode(",", $blogTag->tags), $tags);
			}

			foreach ($tags as &$tag) {
				$tag = trim($tag);
			}
			$result = $this->getTagsWeight($tags);
			return $result;

		}

		public function latest_comments(){
			$results = array();
			foreach($this->latest_comments as $c){
				$results[] = array(
					'user'=>$c->author,
					'id'=>$c->id,
					'title'=>$c->blog->title,
					'comment'=>$this->strip($c->comment,120),
					'created'=>$this->time_ago($c->created_at),
					'url'=>URL::route('blog_show',array('id'=>$c->blog->id,'slug'=>$c->blog->slug))
				);
			}
			return $results;
		}

		private function time_ago($time){
		$now = new DateTime();
		$created = new DateTime($time);
		$diff = $now->diff($created,TRUE);
		if($diff->y>0){
			return $diff->y.Lang::get('date.years_ago');
		}
		if($diff->m>0){
			return $diff->m.Lang::get('date.months_ago');
		}
		if($diff->d>0){
			return $diff->d.Lang::get('date.days_ago');
		}
		if($diff->h>0){
			return $diff->h.Lang::get('date.hours_ago');
		}
		if($diff->i>0){
			return $diff->y.Lang::get('date.minutes_ago');
		}
		else{
			return Lang::get('date.less_than_minute_ago');
		}

	}
	private function strip($string,$limit){
		if(strlen($string)>$limit) return substr($string,0,$limit);
		return $string;
	}

		private function getTagsWeight($tags)
		{
			$tagWeights = array();
			if (empty($tags))
				return $tagWeights;

			foreach ($tags as $tag) {
				$tagWeights[$tag] = (isset($tagWeights[$tag])) ? $tagWeights[$tag] + 1 : 1;
			}
			// Shuffle the tags
			uksort($tagWeights, function () {
				return rand() > rand();
			});

			$max = max($tagWeights);

			// Max of 5 weights
			$multiplier = ($max > 5) ? 5 / $max : 1;
			foreach ($tagWeights as &$tag) {
				$tag = ceil($tag * $multiplier);
			}
			$res = array();
			foreach($tagWeights as $key=>$value){
				$res[] = array('name'=>$key,'weight'=>$value);
			}
			return $res;
		}

}