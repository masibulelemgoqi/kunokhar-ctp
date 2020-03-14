
<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.bundle.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/ajax.js"></script>
<script src="../public/js/main.js"></script>
<script src="../public/js/somefunctions.js"></script>
<script src="../public/js/validate.js"></script>
<script type="text/javascript">
    function timeChecker()
    {
        setInterval(function()
        {
            var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
            timeCompare(storedTimeStamp);
        },3000);
    }


    function timeCompare(timeString)
    {
        var maxMinutes  = 10;  //GREATER THAN 10 MIN.
        var currentTime = new Date();
        var pastTime    = new Date(timeString);
        var timeDiff    = currentTime - pastTime;
        var minPast     = Math.floor( (timeDiff/60000) );

        if( minPast > maxMinutes)
        {
            sessionStorage.removeItem("lastTimeStamp");
            window.location = "./session_timeout.php";
            return false;
        }
    }

    if(typeof(Storage) !== "undefined")
    {
        $(document).mousemove(function()
        {
            var timeStamp = new Date();
            sessionStorage.setItem("lastTimeStamp",timeStamp);
        });

        timeChecker();
    }


</script>
</body>
</html>
