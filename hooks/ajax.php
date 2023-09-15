<?php
$root_directory = dirname(__FILE__);
include_once("$root_directory/helpers.php");

// submit_evaluation();

// function submit_evaluation()
// {
    $name = $_POST['name'];
    $institution = $_POST['institution'];
    $session_name = $_POST['session_name'];
    $user_inputs = json_decode($_POST['user_inputs'], true);

    try
    {
        if ($name != '' || $institution != '') {
            $respondent_id = save_respondent($name, $institution);
        } else {
            $respondent_id = 1;
        }

        foreach ($user_inputs as $user_input => $value)
        {
            if (!empty($value)) {
                $result_response = save_response(
                    $value,
                    $user_input,
                    $respondent_id
                );
            }
        }

    } catch(Exception $e) {

        return $e;
    }
// }
