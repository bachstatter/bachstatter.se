<?php 
	class PortfolioItem extends BaseModel{
		//name of my table
  		const TABLE_NAME = 'portfolioItems';

	    public $id, $title, $content, $categoryId;

	    // when I call this func w an array all array items
	    // will be added to this class variables
  		public function __construct(array $attributes = null) {
	    	if ($attributes === null) return;
	    	foreach ($attributes as $key => $value) {
	      		$this->$key = $value;
		    }
	    }
	    // variable for url for all port items
	    private static $url = '/porfolio_items';
	
		//func that will return a url for specific item 
	    public function url(){
	    	return "/portfolio_item.php?id=" . $this->id;
	    }

	    //will return private var $url
	    public static function indexURL(){
	    	return self::$url;
	    }


	    /* I need to put in some more for admin page*/

	}// class end

?>