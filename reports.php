<?php
$currDir = dirname(__FILE__);
include_once("$currDir/hooks/helpers.php");
include_once("$currDir/defaultLang.php");
include_once("$currDir/language.php");
include_once("$currDir/lib.php");
include_once("$currDir/header.php");
?>

<style>
    .generate-div
    {
        padding-right: 0px !important;
    }
    .select-div
    {
        padding-right: 0px !important;
        padding-left: 0px !important;
    }
    .session
    {
        width: 100% !important;
    }
</style>

<script>
    $j(document).ready(function()
    {
        $j('#session').select2();
    });
</script>

<div class="container">
    <h4>Get responses from:</h4>
    <div style="margin-bottom: 70px;">
        <div class="col-xs-10 select-div">
            <select name="session" id="session" class="session">
            <?php
                $sessions = get_all_sessions();

                while ($row_sessions = $sessions->fetch_assoc())
                {
                    echo "<option value='".$row_sessions['id']."'>".$row_sessions['session_name']."</option>";
                }
            ?>
            </select>
        </div>
        <div class="col-xs-2 generate-div">
            <button class="btn btn-default btn-block" id="generate_report" onclick="window.location.href='reports.php?session_id='+$j('#session').find(':selected').val()">generate</button>
        </div>
    </div>
    <?php
        if (isset($_GET['session_id']))
        {
            $session_id = $_GET['session_id'];
            $session_name = get_session_name($session_id);
            echo "<hr><h3 class='text-center'>".$session_name."</h3><hr>";
            $session_questions = get_session_questions($session_id);

            while ($row_session_questions = $session_questions->fetch_assoc())
            {
                $question_id = $row_session_questions['question_id'];
                $session_question_id =  $row_session_questions['id'];
                $question = get_question($question_id);
                echo "<h4>".$question."</h4>"
    ?>
    <div class="table-responsive">
        <table class="table table-bordered reportsTable" id="<?php echo $question ?>">
            <thead>
                <tr>
                    <th>Respondent Name</th>
                    <th>Respondent Institution</th>
                    <th>Response</th>
                </tr>
            </thead>
            <tbody>      
                <?php
                    $responses = get_session_question_responses($session_question_id);

                    while ($row_responses = $responses->fetch_assoc())
                    {
                        $respondent_id = $row_responses['respondent_id'];
                        $respondent = get_respondent($respondent_id);
                        echo "<tr>";

                        while ($row_respondent = $respondent->fetch_assoc())
                        {
                            echo "<td>".$row_respondent['name']."</td>";
                            echo "<td>".$row_respondent['institution']."</td>";
                        }

                        echo "<td>".$row_responses['response']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php } } ?>
</div>

<?php include_once("$currDir/footer.php"); ?>