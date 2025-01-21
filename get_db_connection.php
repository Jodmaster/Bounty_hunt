<?php
// returns a PHP data object (PDO)

require // path to sql pass 

'';

function get_db_connection() {

    $data_source_name = DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME;

    try {

        return new PDO($data_source_name, DB_USER, DB_PASSWORD);

        } catch (PDOException $e) {

            // could do something more useful here
            echo "couldn't get a handle on the database ".$e."\n";
            return NULL;
        }
    }
?>