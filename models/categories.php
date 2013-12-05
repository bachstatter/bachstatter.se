<?php 
	class Category extends BaseModel{
		//name of my table
  		const TABLE_NAME = 'categories';
  		// public variables represent the collumns I have in db
	    public $id, $name;

	    // when I call this func w an array as parameter all array items
	    // will be added to this class variables
  		public function __construct(array $attributes = null) {
	    	// dont do anything if we dont get an parameter.
	    	if ($attributes === null) return;
	    	// loop through our array set the keys and vlaues to our class variables
	    	foreach ($attributes as $key => $value) {
	      		$this->$key = $value;
		    }
	    }

	    // does teh same as constructor func but can get calles as an instance.
	    public function attributes(array $attributes = null){
	    	if ($attributes === null) return;
	    	foreach ($attributes as $key => $value) {
	      		$this->$key = $value;
		    }
	    }

	    // return a link to an edit page. $this->id will be this obj id
	    public function adminEditUrl() {
    		return '/admin/category/edit.php?id=' . $this->id;
  		}

  		// return a link to remove page
  		public function adminRemoveUrl(){
    		return '/admin/category/remove.php?id=' . $this->id;
  		}

  		// saves  name and ID to db
  		public function save() {
		    // prepare mysql string
		    $statement = self::$dbh->prepare(
		      "UPDATE ".self::TABLE_NAME." SET name=:name
		                                   WHERE id=:id");
		    // execute and sets the id and name to this obj values
		    $statement->execute(array('id' => $this->id,
		                              'name' => $this->name
		                             ));
  		}

  		// removes this object  
  		public function remove(){
		    $statement = self::$dbh->prepare(
		      "DELETE FROM ".self::TABLE_NAME." WHERE id=:id");
		    $statement->execute(array('id' => $this->id));
  		}
  		// add new object to db
  		public function add(){
  			 $statement = self::$dbh->prepare(
		      "INSERT INTO ".self::TABLE_NAME." (name) VALUES (:name)");
		      // Exekverar mysql kommando
		    	$statement->execute(array('name' => $this->name));
		    	//since we dont have an ID (db will auto incr) I use func lastInsertId and sets that this obj ID
		    	$this->id = self::$dbh->lastInsertId();
  		}


  		// lägg till in array

	}// class end

?>