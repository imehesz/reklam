<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @return <type> 
 */
function find_reklam( $limit = NULL )
{
    $time = time();

    if( $limit  )
    {
        return find_objects_by_sql("SELECT * FROM `schedule` WHERE startdate<$time AND enddate>$time ORDER BY score DESC, startdate LIMIT $limit");
    }

    return find_objects_by_sql("SELECT * FROM `schedule` WHERE startdate<$time AND enddate>$time ORDER BY score DESC, startdate");

}
