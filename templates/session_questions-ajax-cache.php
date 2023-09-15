<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'session_questions';

		/* data for selected record, or defaults if none is selected */
		var data = {
			session_id: <?php echo json_encode(array('id' => $rdata['session_id'], 'value' => $rdata['session_id'], 'text' => $jdata['session_id'])); ?>,
			question_id: <?php echo json_encode(array('id' => $rdata['question_id'], 'value' => $rdata['question_id'], 'text' => $jdata['question_id'])); ?>,
			question_type: <?php echo json_encode(array('id' => $rdata['question_type'], 'value' => $rdata['question_type'], 'text' => $jdata['question_type'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for session_id */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'session_id' && d.id == data.session_id.id)
				return { results: [ data.session_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for question_id */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'question_id' && d.id == data.question_id.id)
				return { results: [ data.question_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for question_type */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'question_type' && d.id == data.question_type.id)
				return { results: [ data.question_type ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

