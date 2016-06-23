<?php
    include 'bd.php';
    include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comments</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
	
</head>
<body>
    <div class="body container">

        <h1 class="text-center">Lorem ipsum</h1>
        <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                <strong>
                    <?php 
                        ShowCommentQuantity(); 
                    ?>
                </strong>
            </div>
        </div>
        <div class="row">

            <div class="col-md-5">
                <div id="res">
                </div>
            </div>

            <div class="list-comments col-md-7">
                <?php
                    ShowCommentList(0, 0);
                ?>
            </div>
            
        </div>
        <br>
        
        <div class="row">
            <div class="col-md-5"></div>
            <div class="form-group col-md-7" data-idcomment="0">
                <form id="add">
                    <textarea class="form-control" rows="4" placeholder="Add a comment..." name="comment"></textarea>
                    <button type="submit" class="btn btn-primary btn-post">Post</button>
                </form>
            </div>
        </div>

    </div>

    <script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/request.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>

</body>
</html>