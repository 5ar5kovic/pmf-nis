function insert_success(r) {
	console.log(r);
}

function match_success(r) {
	var e = $('#h2_content');
	e.empty();

	for (i = 0; i < r.length; i++) {
		var rr = r[i];
		var str = "";

		str += "<div class='us'><h4>";
		str += rr['name'];
		str += "</h4><a href='mailto:";
		str += rr['email'];
		str += "'>";
		str += rr['email'];
		str += "</a><div class='us-desc'><p>";
		str += rr['description'];
		str += "</p></div><div class='us-tags'>";
		str += rr['tags'];
		str += "</div></div>";

		e.append(str);
	}
}

function send_to_database(t, n, e, d, g) {
	o = {
		'action': 'insert',
		'type': t,
		'name': n,
		'email': e,
		'description': d,
		'tags': g
	};

	$.post('../db.php', o, insert_success, 'text');
}

function get_result_set(g, t) {
	o = {
		'action': 'match',
		'type': t,
		'tags': g,
		'rows': 10
	};

	$.post('../db.php', o, match_success, 'json');
}