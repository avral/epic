<?php 
$a = [
		[
			'Privet' => 'Hello'

	],
		[
			'Moloko' => 'milk'
	],
		[
			'hleb' => 'bread'
	],
];

$b = $_GET['delete'];

if (isset($b)) {
	unset($a[1]);
}

var_dump($a);


?>