<?php
$root_directory = dirname(__FILE__);
include_once("$root_directory/helpers.php");

$respondent_id = 1;

$user_input = [
    { 'ip': 'ip', 'question_id': 1, 'response': $("#1").val(), 'remarks': 'none' },
    { 'ip': 'ip', 'question_id': 2, 'response': $("#2").val(), 'remarks': 'none' },
    { 'ip': 'ip', 'question_id': 3, 'response': $("#3").val(), 'remarks': 'none' },
    { 'ip': 'ip', 'question_id': 4, 'response': $("#4").val(), 'remarks': 'none' },
    { 'ip': 'ip', 'question_id': 5, 'response': $("#5").val(), 'remarks': 'none' },
    { 'ip': 'ip', 'question_id': 6, 'response': $("#6").val(), 'remarks': 'none' },
    { 'ip': 'ip', 'question_id': 7, 'response': $("#7").val(), 'remarks': 'none' }
];


foreach ($user_inputs as $user_input)
{
    $result_response = save_response(
        $user_input['ip'],
        $user_input['response'],
        $user_input['question_id'],
        $user_input['remarks'],
        $respondent_id
    );
}