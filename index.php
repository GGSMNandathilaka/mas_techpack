<!DOCTYPE html>
<a href="backend_events.php"></a>
<html>
    <head>
        <title>MAS Tech Pack Scheduler</title>
        <!-- demo stylesheet -->
        <link type="text/css" rel="stylesheet" href="media/layout.css" />    

        <!-- helper libraries -->
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>

        <!-- daypilot libraries -->
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

        <!-- daypilot themes -->
        <link type="text/css" rel="stylesheet" href="themes/scheduler_8.css" />    
        <link type="text/css" rel="stylesheet" href="themes/areas.css" />    
    </head>
    <body>
        <div id="header">
            <div class="bg-help">
                <div class="inBox">
                    <h1 id="logo">MAS Tech Pack Scheduler</a></h1>
                    <p id="claim">Store tech packs</p>
                    <hr class="hidden" />
                </div>
            </div>
        </div>
        <div class="shadow"></div>
        <div class="hideSkipLink">
        </div>
        <div class="main">

            <div class="space"></div>

            <div id="dp"></div>

            <script type="text/javascript">
                var dp = new DayPilot.Scheduler("dp");

                dp.treeEnabled = true;

                dp.scale = "Day";
                dp.startDate = new DayPilot.Date().firstDayOfMonth();
                dp.days = dp.startDate.daysInMonth();

                dp.timeHeaders = [
                    {groupBy: "Month", format: "MMMM yyyy"},
                    {groupBy: "Day", format: "d"}
                ];

                dp.cellWidthSpec = "Auto";
                dp.bubble = new DayPilot.Bubble({
                });
                
                dp.onEventClick = function (args) {
                    var modal = new DayPilot.Modal();
                    modal.closed = function () {
                        // reload all events
                        var data = this.result;
                        if (data && data.result === "OK") {
                            loadEvents();
                        }
                    };
                    modal.showUrl("edit.php?id=" + args.e.id());
                };

                dp.init();

                //load resources
                loadResources();
                //load events
                loadEvents();

                function loadEvents() {
                    var start = dp.startDate;
                    var end = dp.startDate.addDays(dp.days);

                    $.post("backend_events.php",
                            {
                                start: start.toString(),
                                end: end.toString()
                            },
                    function (data) {
                        dp.events.list = data;
                        dp.update();
                    }
                    );
                }

                function loadResources() {
                    $.post("backend_resources.php", function (data) {
                        dp.resources = data;
                        dp.update();
                    });
                }

            </script>

        </div>
        <div class="clear">
        </div>
    </body>
</html>

