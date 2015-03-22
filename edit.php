<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Event</title>
        <link type="text/css" rel="stylesheet" href="media/layout.css" />  
        <link type="text/css" rel="stylesheet" href="themes/table.css">
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    </head>

    <body>
        

        <div id="page-wrap">

            <h1>MAS Tech Pack Schedule Table</h1>
            <?php
                $db= new SqliteDatabase('techpack.sqlite');
                $result = $db->query('SELECT * FROM resources');
            ?>
            
            
            <table>
                <thead>
                    <tr>
                        <th>TP date</th>
                        <th>Style No</th>
                        <th>Account</th>
                        <th>Factory</th>
                        <th>Integration</th>
                        <th>TP Passoff</th>
                        <th>Feedback</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>James</td>
                        <td>Matman</td>
                        <td>Chief Sandwich Eater</td>
                        <td>Lettuce Green</td>
                        <td>Trek</td>
                        <td>Digby Green</td>
                        <td>January 13, 1979</td>
                        <td>Gotham City</td>
                    </tr>
                    <tr>
                        <td>The</td>
                        <td>Tick</td>
                        <td>Crimefighter Sorta</td>
                        <td>Blue</td>
                        <td>Wars</td>
                        <td>John Smith</td>
                        <td>July 19, 1968</td>
                        <td>Athens</td>
                    </tr>
                    <tr>
                        <td>Jokey</td>
                        <td>Smurf</td>
                        <td>Giving Exploding Presents</td>
                        <td>Smurflow</td>
                        <td>Smurf</td>
                        <td>Smurflane Smurfmutt</td>
                        <td>Smurfuary Smurfteenth, 1945</td>
                        <td>New Smurf City</td>
                    </tr>
                    <tr>
                        <td>Cindy</td>
                        <td>Beyler</td>
                        <td>Sales Representative</td>
                        <td>Red</td>
                        <td>Wars</td>
                        <td>Lori Quivey</td>
                        <td>July 5, 1956</td>
                        <td>Paris</td>
                    </tr>
                    <tr>
                        <td>Captain</td>
                        <td>Cool</td>
                        <td>Tree Crusher</td>
                        <td>Blue</td>
                        <td>Wars</td>
                        <td>Steve 42nd</td>
                        <td>December 13, 1982</td>
                        <td>Las Vegas</td>
                    </tr>
                </tbody>
            </table>
            
        </div>

        <script type="text/javascript">
            function close(result) {
                if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
                    parent.DayPilot.ModalStatic.close(result);
                }
            }

            $("#f").submit(function() {
                var f = $("#f");
                $.post(f.attr("action"), f.serialize(), function(result) {
                    close(eval(result));
                });
                return false;
            });

            $(document).ready(function() {
                $("#name").focus();
            });

        </script>
    </body>
</html>
