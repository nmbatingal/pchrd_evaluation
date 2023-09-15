<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'responses';

		/* data for selected record, or defaults if none is selected */
		var data = {
			respondent_id: <?php echo json_encode(array('id' => $rdata['respondent_id'], 'value' => $rdata['respondent_id'], 'text' => $jdata['respondent_id'])); ?>,
			question_id: <?php echo json_encode(array('id' => $rdata['question_id'], 'value' => $rdata['question_id'], 'text' => $jdata['question_id'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for respondent_id */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'respondent_id' && d.id == data.respondent_id.id)
				return { results: [ data.respondent_id ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for question_id */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'question_id' && d.id == data.question_id.id)
				return { results: [ data.question_id ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

