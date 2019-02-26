<?php
	function getArticles($path)
	{
		$art = new Articles($path);
		$artArray = $art->getArticles();
		return $artArray;
	}
	
	class Articles
	{
		public function __construct($_path)
		{
			$path = realpath(dirname(__FILE__)) . "/" . $_path;
			$this->artArr = array();
			if(is_dir($path))
			{
				$h = opendir($path);
				while($d = readdir($h))
				{
					$tmpPath = $path . '/' . $d;
					if ($d != "." && $d != ".." && is_dir($tmpPath)) 
					{
						if($this->checkArticle($tmpPath, $d)) { $art = new Article($tmpPath, $d); array_push($this->artArr, $art); }
					}
				}
			}
		}
		
		public function getArticles()
		{
			return $this->artArr;
		}
		
		public function checkArticle($path, $name)
		{
			return file_exists($path . "/" . $name . ".article.php");
		}
		
	}
	
	class Article
	{
		public function __construct($_path, $name)
		{
			$this->path = $_path;
			$class = $name . "_article";
			require $this->path . "/" . $name . ".article.php";
			$article_obj = new $class;
			$this->title = $article_obj->title;
			$this->creation = $article_obj->creation;
			$this->article = $article_obj->content();			
		}
	}
	
?>