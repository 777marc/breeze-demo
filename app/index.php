<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Breeze ChMS - Demo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/jquery.dynatable.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>

        <div style="width:800px; margin:0 auto;">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="app/">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="app/help.php">Help</a>
                    </div>
                </div>
            </nav>

            <div id="dvImportSegments" class="fileupload ">
                <fieldset>
                    <p>Upload your CSV File</p>
                        <input type="file" name="File Upload" id="txtFileUpload" accept=".csv" />
                </fieldset>
                <hr>
                <div id="results-div">
                    <table id="people-table" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <th scope="row" data-dynatable-column="person_id">Id</th>
                            <th scope="row" data-dynatable-column="first_name">First Name</th>
                            <th scope="row" data-dynatable-column="last_name">Last Name</th>
                            <th scope="row" data-dynatable-column="email_address">Email Address</th>
                            <th scope="row" data-dynatable-column="group_name">Group Name</th>
                            <th scope="row" data-dynatable-column="state">Status</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div id="errors" class="alert alert-danger" role="alert"></div>
                <div id="messages" class="alert alert-info" role="alert"></div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="js/libraries/jquery.csv.js"></script>
        <script src="js/libraries/jquery.dynatable.js"></script>
        <script src="js/app.js"></script>
        <script src="js/validator.js"></script>

    </body>
</html>