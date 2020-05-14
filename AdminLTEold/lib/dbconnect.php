<?php

class dbconnect
{
    function connect()
    {
        $connection=mysqli_connect("localhost","root","","maindb");
				return $connection;
    }
}
/*sarthak*/
?>