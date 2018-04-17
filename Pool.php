<?php

class JDBCConeection{
    protected Static $locked = array ($Connectio=>$Long);
    private Static $unlocked = array ($Connectio=>$Long);
    private static $expiretime = 30;

public function expire ($con)
{
    $con =null;
}
public function validation ($con)
{
    return (is_null($con));
}
public function Checkout ()
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
    //$t = create();
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
