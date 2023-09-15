<?php

$root_directory = dirname(__FILE__);
include_once("$root_directory/helpers.php");

$session_id = $_GET['session_id'];
$session_name = get_session_name($session_id);

if (isset($_GET['lang']) && $_GET['lang'] == 'filipino')
{
   require_once("$root_directory/fil.lang.php");
   $lang = 'filipino';
}
else
{
   require_once("$root_directory/en.lang.php");
   $lang = 'english';
}

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $session_name; ?> Evaluation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="../resources/initializr/css/bootstrap.css">

	<script src="../resources/jquery/js/jquery-1.12.4.min.js"></script>
	<script src="../resources/initializr/js/vendor/bootstrap.min.js"></script>
	<script src="script.js"></script>
    <style>
        .modal { z-index: 2000 !important; }
    </style>
</head>
<body>
    <div id="container" class="container">
        <!-- <div class="row" style="margin-top: 30px;">
            <div class="col-sm-4 col-sm-offset-4 text-center">
                <div class="col-sm-6">
                    <a href="evaluation.php?session_id=9&lang=filipino" class="btn btn-default btn-lg pull-right">Filipino</a>
                </div>
                <div class="col-sm-6">
                    <a href="evaluation.php?session_id=8&lang=english" class="btn btn-default btn-lg pull-left">English</a>
                </div>
            </div>
        </div> -->

        <div class="row text-center">
            <div class="col-sm-12">
                <img
                    src="../images/Login.gif"
                    alt="NSTW Banner"
                    width="360px"
                >
            </div>
        </div>

        <div class="row text-left">
            <div class="col-sm-12">
                <h3 style="margin-top: 30px; color: #2b6fb6">
                    <br>
                    <b><?php echo $session_name; ?></b><br>
                    <br> <!-- New line added here -->
                </h3>
            </div>
        </div>

     <!--    <div class="row addPaddingBottom10px">
            <div class="col-sm-8 col-sm-offset-2">
                <hr>  
            </div>
        </div> -->

        <form>
        <?php
            $no_of_questions = count_session_questions($session_id);
            $questions = get_session_questions($session_id);
            $questions_html = load_session_questions($questions, $lang);

            echo $questions_html;
        ?>
        </form>

        <input
            type="hidden"
            name="no_of_questions"
            id="no_of_questions"
            value="<?php echo $no_of_questions; ?>
        ">
        <input
            type="hidden"
            name="session_name"
            id="session_name"
            value="<?php echo $session_name; ?>
        ">

        <!-- <div class="addPaddingBottom10px">
            <label for="name"><?php echo NAME; ?></label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control">
        </div>

        <div class="addPaddingBottom10px">
            <label for="institution"><?php echo INSTITUTION; ?></label>
            <input
                type="text"
                id="institution"
                name="institution"
                class="form-control">
        </div> -->
        
        <div class="
                submit-div
                col-xs-12
                col-md-2 col-md-offset-5
                col-lg-2 col-lg-offset-5">
            <br></br>
            <button
                id="evaluate"
                style="font-size: 20px;"
                class="
                    btn
                    btn-primary
                    btn-lg
                    btn-block
            "><?php echo SUBMIT; ?></button><br></br>
        </div><br />

        <!-- successModal -->
        <div id="successModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Event Evaluation</h3>
                    </div>
                    <div class="modal-body text-center">
                        <span
                            class="glyphicon glyphicon-ok-circle fontSize120px"
                            style="color: green;"
                        ></span>
                        <p><h4><?php echo THANK_YOU; ?></h4></p>

                        <?php

                            $session_has_token = get_session_has_token($session_id);

                            if ($session_has_token == 'Yes')
                            {
                                echo "<p><h4>".TOKEN."</h4></p>";
                            }

                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href='evaluation.php?session_id=13&lang=english'">
                            <?php echo CLOSE; ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- warningModal -->
        <div id="warningModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Event Evaluation</h3>
                    </div>
                    <div class="modal-body text-center">
                        <span
                            class="glyphicon glyphicon-exclamation-sign fontSize120px"
                            style="color: orange;"
                        ></span>
                        <p><h4><?php echo PLEASE_ANSWER; ?></h4></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <?php echo CLOSE; ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- errorModal -->
        <div id="errorModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Event Evaluation</h3>
                    </div>
                    <div class="modal-body text-center">
                        <span
                            class="glyphicon glyphicon-remove-sign fontSize120px"
                            style="color: red;"
                        ></span>
                        <p><h4><?php echo ERROR; ?></h4></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <?php echo CLOSE; ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>