<?php
$root_directory = dirname(__FILE__);
include_once("$root_directory/../defaultLang.php");
include_once("$root_directory/../language.php");
include_once("$root_directory/../lib.php");

function emojiRatings($id, $question, $lang)
{
    $icons = [
        'hearteyes.gif',
        'perfect.gif',
        'think.gif',
        'notinterested.gif',
        'anger.gif'
    ];

    if ($lang == 'filipino')
    {
        include_once(__DIR__."/fil.lang.php");
    }
    else
    {
        include_once(__DIR__."/fil.lang.php");
    }

    $values = [
        'Strongly Agree!',
        'Agree!',
        'Neutral',
        'Disagree!',
        'Strongly disagree!'
    ];

    $html = '
        <div class="text-center" style="margin-bottom:70px;">
            <h1>
                <b>'.$question.'</b>
            </h1>
        </div>
        
        <div style="display:flex;width:100%;">
            
    ';

    for ($i = 0; $i <= 4; $i++)
    {
        
        $html .= '
            <div class="text-center" style="flex:1;">
                <input
                    class="emojiRadio radioGroup'.$id.'"
                    type="radio"
                    id="'.$i.'_'.$id.'"
                    name="'.$id.'"
                    value="'.$values[$i].'"
                    style="visibility: hidden;"
                    required
                />
                <label
                    for="'.$i.'_'.$id.'"
                    data-toggle="tooltip"
                    title="'.$tooltips[$i].'"
                    id="'.$id.'"
                    class=""
                >
                    <img
                        src="../images/emojis/'.$icons[$i].'"
                        width="100%"
                    />
                </label>
            </div>
        ';
    }
    // $html .= '
    //         <br>
    //         <input
    //             class="emojiRadio"
    //             type="radio"
    //             id="noAnswer"
    //             name="'.$id.'"
    //             value="No Answer"
    //             style="visibility: hidden;"
    //             required
    //         />
    //         <label
    //             for="noAnswer"
    //             data-toggle="tooltip"
    //             title="No Answer"
    //             class="text-danger"
    //         >
    //             <i class="
    //                 glyphicon
    //                 glyphicon-remove"
    //             style="color: red;"></i>    No Answer
    //         </label>';
    $html .= '</div>';

    return $html;
}

function likertScale($id, $question)
{
    $scales = [
        'Strongly Agree',
        'Agree',
        'Neutral',
        'Disagree',
        'Strongly Disagree'
    ];

    $html = '
        <div>
            <p>
                <b>'.$question.'</b>
            </p>
        </div>
        <div class="addPaddingBottom10px">';

    for ($i = 0; $i <= 4; $i++) {
        $html .= '
            <div class="radio">
                <label>
                    <input
                        type="radio"
                        name="'.$id.'"
                        value="'.$scales[$i].'"
                        required
                    >   '.$scales[$i].'
                </label>
            </div>';
    }

    $html .= '</div>';

    return $html;
}

function yes_no($id, $question)
{
    $scales = [
        'Yes',
        'No'
    ];

    $html = '
        <div>
            <p>
                <b>'.$question.'</b>
            </p>
        </div>
        <div class="addPaddingBottom10px">';

    for ($i = 0; $i < count($scales); $i++) {
        $html .= '
            <div class="radio">
                <label>
                    <input
                        type="radio"
                        name="'.$id.'"
                        value="'.$scales[$i].'"
                        required
                    >   '.$scales[$i].'
                </label>
            </div>';
    }

    $html .= '</div>';

    return $html;
}

function freetextInput($id, $question)
{
    $html = '
        <div class="addPaddingBottom10px">
            <label for="'.$id.'">'.$question.'</label>
            <input
                type="text"
                name="'.$id.'"
                class="form-control"
                required>
        </div>
    ';

    return $html;
}

function satisfactionSurvey($id, $question)
{
    $scales = [
        'Excellent',
        'Very Satisfactory',
        'Satisfactory',
        'Fair',
        'Poor'
    ];

    $html = '
            <p>
                <b>'.$question.'</b>
            </p>
            <div class="addPaddingBottom10px">';

    for ($i = 0; $i <= 4; $i++) {
        $html .= '
            <div class="radio">
                <label>
                    <input
                        type="radio"
                        name="'.$id.'"
                        class="'.$id.'"
                        value="'.$scales[$i].'"
                        required
                    >   '.$scales[$i].'
                </label>
            </div>';
    }

    $html .= '</div>';

    return $html;
}

function commentTextarea($id, $question)
{
    $html = '
        <div class="addPaddingBottom10px">
            <label for="'.$id.'">'.$question.'</label>
            <textarea
                name="'.$id.'"
                class="
                    form-control
                    comment_textarea"
                required></textarea> 
        </div>
    ';

    return $html;
}

function save_respondent($name, $institution)
{
    $query = "
        INSERT INTO `respondents` (
            `name`,
            `institution`
        ) VALUES (
            '{$name}',
            '{$institution}'
        )
    ";

    $result = sql($query, $eo);

    $queryid = "SELECT LAST_INSERT_ID()";

    $respondent_id = sqlValue($queryid, $eo);
    
    return $respondent_id;
}

function save_response($response, $question_id, $respondent_id)
{
    $query = "
        INSERT INTO `responses` (
            `response`,
            `question_id`,
            `respondent_id`
        ) VALUES (
            '{$response}',
            '{$question_id}',
            '{$respondent_id}'
        )
    ";

    $result = sql($query, $eo);

    return $result;
}

function get_question($id)
{
    $query = "
        SELECT `question`
        FROM `questions`
        WHERE `id` = '{$id}'
    ";

    $result = sqlValue($query, $eo);

    return $result;
}

function get_session_name($id)
{
    $query = "
        SELECT `session_name`
        FROM `sessions`
        WHERE `id` = '{$id}'
    ";

    $result = sqlValue($query, $eo);

    return $result;
}

function count_session_questions($session_id)
{
    $query = "
        SELECT COUNT(*)
        FROM `session_questions`
        WHERE `session_id` = '{$session_id}'
    ";

    $result = sqlValue($query, $eo);

    return $result;
}

function get_session_questions($session_id)
{
    $query = "
        SELECT *
        FROM `session_questions`
        WHERE `session_id` = '{$session_id}'
        ORDER BY `order` ASC
    ";

    $result = sql($query, $eo);

    return $result;
}

function load_question($question_type_id, $question_id, $id, $lang)
{
    $question = get_question($question_id);
    $html = '';

    switch ($question_type_id) {
        case 1:
            $html = emojiRatings($id, $question, $lang);
            break;
        case 2:
            $html = likertScale($id, $question);
            break;
        case 3:
            $html = freetextInput($id, $question);
            break;
        case 4:
            $html = satisfactionSurvey($id, $question);
            break;
        case 5:
            $html = commentTextarea($id, $question);
            break;
        case 6:
            $html = yes_no($id, $question);
            break;
    }

    return $html;
}

function load_session_questions($questions, $lang)
{
    $html = '';

    while ($row = $questions->fetch_assoc())
    {
        $html .= load_question($row['question_type'], $row['question_id'], $row['id'], $lang);
    }

    return $html;
}
function get_session_has_token($id)
{
    $query = "
        SELECT `has_token`
        FROM `sessions`
        WHERE `id` = '{$id}'
    ";

    $result = sqlValue($query, $eo);

    return $result;
}
function get_all_sessions()
{
    $query = "
        SELECT *
        FROM `sessions`
        ORDER BY id DESC
    ";

    $result = sql($query, $eo);

    return $result;
}
function get_session_question_responses($question_id)
{
    $query = "
        SELECT *
        FROM `responses`
        WHERE `question_id` = '{$question_id}'
    ";

    $result = sql($query, $eo);

    return $result;
}
function get_respondent($respondent_id)
{
    $query = "
        SELECT *
        FROM `respondents`
        WHERE `id` = '{$respondent_id}'
    ";

    $result = sql($query, $eo);

    return $result;
}