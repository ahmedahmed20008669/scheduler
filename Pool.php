<?php

class JDBCConeection{
    protected Static $locked = array ($Connectio=>$Long);
    private Static $unlocked = array ($Connectio=>$Long);
    private static $expiretime = 30;

    private Static $servername = "localhost";
    private Static $username = "AhmedHassn";
    private Static $password = "1234";


public function CreateConnection()
{
    $con = new mysqli(self::$servername, self::$username, self::$password);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
        $con->close();
    }
    else
    {
        return $con;
    } 
}
public function expire ($con)
{
    $con->close();
}
public function validation ($con)
{
    return (is_null($con));
}
public function CheckOut ()
{
    $now = $Time.time();
    $t = null;
    if (self::unlocked->size()>0)
    {
        $e = self::unlocked->keys();
        while (next($unlocked)!== false)
        {
            $t= $e->next($unlocked);
            if (($now - self:: $unlocked->$t) > self::$expiretime)
            {
                //unset(self::$unlocked->$t);
                array_diff(self::$unlocked,$t);
               // print ("Object hs expired<br>");
                expire($t);
                $t=null;
            }
            else{
                if (validation($t))
                {
                    //unset(self::$unlocked->$t);
                    array_diff(self::$unlocked,$t);
                    array_push($locked,$t,$now);
                  //  print "Rese object from bool <br>";
                  return $t;

                }
                else
                {
                    //unset(self::$unlocked->$t);
                    array_diff(self::$unlocked,$t);
                   // print ("object faild to validition");
                   expire ($t);
                   $t =null;
                }
            }
        }
    }
    $t = CreateConnection();
    array_push(self::$locked, $t,$now);
    //print ("create a new connection");
    return $t;
}
public function CheckIN ($t)
{
    $now = $Time.time();
    array_diff(self::$locked,$t);
    array_push(self::$unlocked.$t,$now);
}
}
?>
