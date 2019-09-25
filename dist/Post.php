<?php
class Post{
	private $title, $link, $creator, $pubDate, $summary, $headerImage, $fullContent, $content;
	private $collectionOfImages = [];
	private $summaryLength = 120;
	
	public function __construct($item){
		$this->title = $item->title;
		$this->link = $item->link;
		$this->creator = $item->children('dc', true)->creator;
		$this->pubDate = $this->stringToDT($item->pubDate);
		$this->fullContent = $item->children('http://purl.org/rss/1.0/modules/content/')->encoded;
		$this->content = $this->parseContent($this->fullContent);
		$this->summary = mb_strimwidth($this->content, 0, $this->summaryLength, '...');
		$this->collectionOfImages = $this->parseImages($this->fullContent);
		if(empty($this->collectionOfImages[0])){
			$this->headerImage = false;
		} else{
			$this->headerImage = $this->collectionOfImages[0];	
		}
	}

	private function stringToDT($dateTimeString){
		$date = date_create_from_format('D, d M Y H:i:s e', $dateTimeString);
		return $date;
	}

	private function parseImages($content){
		$regex = '#<figure>(.*?)</figure>#';
		preg_match_all($regex, $content, $matches);
		if(empty($matches[1])){
			return false;
		}else{
			return $matches[1];
		}	
	}

	private function parseContent($content){
		$globalPTag = NULL;
		//$globalPTag = '<p>';
		$regex = '#<p>(.*?)</p>#';
		preg_match_all($regex, $content, $matches);
		if(empty($matches[1])){
			return false;
		}else{
			foreach($matches[1] as $paragraph){
				$globalPTag .= $paragraph;
			}
			//$globalPTag .= '</p>';
			return $globalPTag;
		}
	}

	public function extractSource($imgTag){
		$regex = '#src="(.*?)"#';
		preg_match($regex,$imgTag,$matches);
		if(empty($matches[1])){
			return false;
		}else{
			return $matches[1];
		}
	}

	public function getTitle(){
		return $this->title;
	}

	public function getLink(){
		return $this->link;
	}

	public function getCreator(){
		return $this->creator;
	}

	public function getPubDate(){
		return $this->pubDate;
	}

	public function getSummary(){
		return $this->summary;
	}

	public function getHeaderImage(){
		return $this->headerImage;
	}

	public function getCollectionOfImages(){
		return $this->collectionOfImages;
	}

	public function getContent(){
		return $this->content;
	}

	public function getFullContent(){
		return $this->fullContent;
	}
}

?>