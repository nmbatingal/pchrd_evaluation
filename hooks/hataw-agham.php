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
	<title>Events Evaluation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="../resources/initializr/css/bootstrap.css">

	<script src="../resources/jquery/js/jquery-1.12.4.min.js"></script>
	<script src="../resources/initializr/js/vendor/bootstrap.min.js"></script>
	<script src="script2.js"></script>
</head>
<body>
    <div class="container">
        <div id="container"
            class="
                col-xs-12
                col-md-8 col-md-offset-2
                col-lg-6 col-lg-offset-3
        " style="margin-top: 35px;">
            <div class="row text-center">
                <img
                    src="../images/pchrd.png"
                    alt="Event Logo"
                    width="75px"
                >
                <img
                    src="../images/nstw.png"
                    alt="Event Logo"
                    width="150px"
                >
                <img
                    src="../images/hataw-agham.png"
                    alt="Event Logo"
                    width="300px"
                >
                <h3>
                    <?php echo HELP_US_EVALUATE; ?><br>
                    <b><?php echo $session_name; ?></b><br>
                    <?php echo COMPLETE_THE_FORM; ?>
                </h3>
            </div>

            <div class="row addPaddingBottom10px">
                <div class="col-sm-8 col-sm-offset-2">
                    <hr>  
                </div>
            </div>

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

            <div class="addPaddingBottom10px">
                <label for="name">Wristband Number</label>
                <input
                    type="number"
                    id="name"
                    name="name"
                    class="form-control">
            </div>

            <!-- <div class="addPaddingBottom10px">
                <label for="institution"><?php echo INSTITUTION; ?></label>
                <input
                    type="hidden"
                    id="institution"
                    name="institution"
                    class="form-control">
            </div> -->
            
            <div class="
                    submit-div
                    col-xs-12
                    col-md-8 col-md-offset-2
                    col-lg-6 col-lg-offset-3"
                style="
                    margin-bottom: 35px;
                    margin-top: 35px;
            ">
                <button
                    id="evaluate"
                    class="
                        btn
                        btn-primary
                        btn-block
                "><?php echo SUBMIT; ?></button>
            </div>

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
                            <p><h4 id="thank_you">Your response has successfully been recorded. thank you very much!</h4></p>
                            <p><b>*Capture this and present to the event committee to get your token.</b></p>

                            <?php

                                $session_has_token = get_session_has_token($session_id);

                                if ($session_has_token == 'Yes')
                                {
                                    echo "<p><h4>".TOKEN."</h4></p>";
                                }

                            ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href='hataw-agham.php?session_id=11&lang=english'">
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
    </div>
</body>
</html>