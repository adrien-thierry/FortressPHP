<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	require("blog.core.php");
	class blog_page
	{
		public function __construct()
		{
			$this->articles = "articles";
		}
	
		public function code()
		{
			$la = $GLOBALS['langage'];
			addDiv("blog");
					$articles = getArticles($this->articles);
					foreach($articles as $article)
					{
						echo "<h1>" . $article->title . "</h1>";
						echo "<div>" . $article->article . "</div>";
					}
			endDiv();
		}
	}
?>