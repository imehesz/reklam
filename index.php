<?php
    require_once 'lib/limonade.php';
    require_once 'lib/db.php';

    defined( 'GENERIC_ERROR' ) or define( 'GENERIC_ERROR', 'Please use a valid REST call to access functionality!' );

    function configure()
    {
        $env = stristr( $_SERVER[ 'HTTP_HOST' ], 'local' ) ? ENV_DEVELOPMENT : ENV_PRODUCTION;
        option('env', $env );

        $db = new PDO(
            'sqlite:data/reklams.sqlite'
        );

        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        
        option('dsn', $dsn);
        option('db_conn', $db);
    }

    dispatch( '/', 'home' );
        function home()
        {
            if( ! sizeof( $_GET ) )
            {
                return GENERIC_ERROR;
            }
        }

    dispatch( '/getreklam/:domain', 'get_reklam' );
        function get_reklam()
        {
            $domain = params( 'domain' );

            if( ! $domain )
            {
                return GENERIC_ERROR;
            }

            $response = array();
            // for security reasons, we return the domain
            $response['status'] = 'success';

            $reklams = find_reklam( $domain );

            $response['item_count'] = sizeof( $reklams );

            if( sizeof( $reklams ) )
            {
                foreach( $reklams as $reklam ) 
                {
                    $response['results'][] = array(
                        'title'     => $reklam->title,
                        'image'     => $reklam->image,
                        'link'      => $reklam->goto_link
                    );
                }
            }   

            return json_encode( $response );
        }

    run();
