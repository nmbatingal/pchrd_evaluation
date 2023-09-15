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
    <h4>Go to Evaluation Form:</h4>
    <div>
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
            <button class="btn btn-default btn-block" id="generate_report" onclick="window.location.href='hooks/evaluation.php?session_id='+$j('#session').find(':selected').val()">Go</button>
        </div>
    </div>
</div>