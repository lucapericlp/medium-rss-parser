<?php

require('Post.php');

class BlogObject{

	private $collectionOfPosts = [];
	private $newsOutput;

	public function __construct($mediumLink) {
		$newsOutput = simplexml_load_file($mediumLink);
		foreach($newsOutput->channel->item as $item){
			$post = new Post($item);
			$this->addPost($post);
		}
		$this->sortByDate();
	}

	private function addPost($postObject){
		$this->collectionOfPosts[] = $postObject;
	}

	private function sortByDate(){
		$arrayOfPosts = $this->collectionOfPosts;
		function sortFunction( $a, $b ) {
			$first = $a->getPubDate()->getTimestamp();
			$second = $b->getPubDate()->getTimestamp();
			return $first - $second;
		}
		usort($arrayOfPosts, "sortFunction");
	}

	public function getPosts(){
		return $this->collectionOfPosts;
	}

}
?>