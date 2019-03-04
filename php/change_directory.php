<?php
// function that provides change of directory with a cd command (abstract system)

class Path {
	public $currentPath;  // original path
	private $intoArray;
	private $newPath;     // changed path
	private $cd = '../'; 

	function __construct($item) {
		// check if path is correctly formatted (start with /, only letters, using / as a separator)
		if (preg_match('/^\/[a-zA-Z\/]+$/', $item)) {
			$this->currentPath = $item;
	    } else {
	    	echo 'Path format is invalid. It has to start with a slash, use slash as a separator and it should contain only lowercase and uppercase letters';
	    }
	}
	function cd($changePath) {
		// convert path into array, throw out end of path and convert back into a string
		$this->intoArray = explode('/', $this->currentPath);
		array_pop($this->intoArray);
		$this->newPath = implode('/', $this->intoArray); 

		// go back one folder to a parent and change to a new dir (use ../ convention)
		if (substr($changePath, 0, strlen($this->cd)) == $this->cd) {  // check for ../ convention..
    		$changePath = substr($changePath, strlen($this->cd));  // keep folder name after ../
    		$this->newPath .= '/' . $changePath;  // and join parent path with a new folder
			echo $this->newPath;  // display new path
			// $this->currentPath = $this->newPath;  // enable if if you want current path to be changed to a new one
    	}  else {  // if user entered invalid path format, i.e. without ../
			echo 'Entered path is not valid';
		}
	}
}


$path = new Path('/a/b/c/d');  // enter a path
echo $path->currentPath;  // display entered path
echo '<br>';
$path->cd('../x');  //  change to a new folder and display new current path
echo '<br>';
echo $path->currentPath;  // if you want current path to show new path, enable line 29


?>
