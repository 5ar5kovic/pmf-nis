<?php

function get_conn() {
	$username = "root";
	$password = "";

	$conn = new PDO("mysql:dbname=h2;host=localhost",
		$username, $password);

	return $conn;
}

function get_all_by_type($type) {
	$conn = get_conn();
	// type je backend promenljiva, nema potrebe za proverama.
	$s = $conn->prepare("select * from users where type = $type");
	$s->execute();
	$r = $s->fetchAll(PDO::FETCH_ASSOC);
	return $r;
}

function get_all() {
	$conn = get_conn();
	$s = $conn->prepare("select * from users");
	$s->execute();
	$r = $s->fetchAll(PDO::FETCH_ASSOC);
	return $r;
}

// var_dump(get_all_by_type(1));

function insert_row($row) {

	$conn = get_conn();
	$s = $conn->prepare("insert into users(type, name, email, description,
		tags) values (?, ?, ?, ?, ?)");

	$s->execute($row);
}

function process_insert_post() {
	if (!isset($_POST['type'])) {
		return false;
	}

	$type = (int)$_POST['type'];
	if ($type < 0) {
		$type = 0;
	} else if ($type > 0) {
		$type = 1;
	}

	$fields = ['name', 'email', 'description', 'tags'];

	foreach ($fields as $field) {
		if (!isset($_POST[$field])) return false;
	}

	$row = [$type];

	foreach ($fields as $field) {
		$row[] = $_POST[$field];
	}

	insert_row($row);
}

// Uzmi sirovi string i od njega napravi niz tagova
function process_tags($a) {
	$x = explode(',', $a);
	$y = [];
	foreach ($x as $e) {
		$f = str_replace(' ', '', strtolower($e));
		$y[] = $f;
	}
	return $y;
}

// Nadji skor poklapanja. $a i $b su nizovi tagova
// a je kljuc, b je red u bazi
function match_score($a, $b) {
	$magic = 0.777;

	$total = 0.0;
	$tmp = 1.0;
	$m = count($b);

	for ($i = 0; $i < $m; $i++) {
		$total += $tmp;
		$tmp *= $magic;
	}

	$scaling = 1.0 / $total;

	$score = 0.0;

	$left_tmp = 1.0;

	foreach ($a as $e) {
		$tmp = 1.0;
		for ($i = 0; $i < $m; $i++) {
			if ($e === $b[$i]) {
				$score += $tmp * $left_tmp;
				break;
			}
			$tmp *= $magic;
		}
		$left_tmp *= $magic;
	}

	return $score;
}

function get_result_set($tags, $h, $type) {
	$data = get_all_by_type($type);
	$n = count($data);

	$data_nice = [];
	for ($i = 0; $i < $n; $i++) {
		$data_nice[$i] = process_tags($data[$i]['tags']);
	}

	$tags_nice = process_tags($tags);

	$assoc = [];

	foreach ($data_nice as $i => $datum) {
		$assoc[$i] = match_score($tags_nice, $datum);
	}

	arsort($assoc);

	if ($h > $n) {
		$h = $n;
	}

	$result_set = [];
	$i = 0;

	foreach ($assoc as $key => $score) {
		$result_set[$i] = $data[$key];
		$i++;
		if ($i == $h) {
			break;
		}
	}

	return $result_set;
}

function process_match_post() {
	if (!isset($_POST['type'])) {
		return false;
	}

	$type = (int)$_POST['type'];
	if ($type < 0) {
		$type = 0;
	} else if ($type > 0) {
		$type = 1;
	}

	if (!isset($_POST['tags'])) return false;
	if (!isset($_POST['rows'])) return false;

	$tags = $_POST['tags'];
	$rows = (int)$_POST['rows'];

	if ($rows < 0) {
		$rows = 0;
	}

	$rs = get_result_set($tags, $rows, $type);

	return $rs;
}

// var_dump(get_result_set("C++, Algorithms", 3, 1));
// echo json_encode(get_result_set("C++, Algorithms", 3, 1));

if (isset($_POST['action'])) {
	$action = $_POST['action'];

	if ($action === 'insert') {
		$succ = process_insert_post();
		if ($succ) {
			echo "OK";
		} else {
			echo "Error!";
		}
	} else if ($action === 'match') {
		$succ = process_match_post();
		if (is_array($succ)) {
			echo json_encode($succ);
		} else {
			echo "[]";
		}
	}
}

	
