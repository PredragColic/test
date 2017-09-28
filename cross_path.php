<?php

function logo_turtle($movements) {

    $coordinates = [0 => [0 => true]];
    $current_coordinate = [
        'x' => 0, 
        'y' => 0
    ];
    $directions = ['n', 'e', 's', 'w'];

    foreach($movements as $move => $distance){

        // cycle through the directions
        $current_direction = array_shift($directions);
        array_push($directions, $current_direction);

        // if the distance is less than 1, then skip it, but we still cycle the direction!
        if ($distance < 1) {
            continue;
        }

        // clean slate
        $coordinates_to_check = [];

        // for each direction, acquire a list of coordinates derived from its traverse
        // these coordinates will be used to check if turtle crosses its own previous path
        switch($current_direction){
            case 'n':

                $x_end = $current_coordinate['x'];
                $y_end = $current_coordinate['y'] + $distance;

                $start = $current_coordinate['y'] + 1;
                foreach(range($start, $y_end) as $value){
                    $coordinates_to_check[] = [ 'x' => $current_coordinate['x'], 'y' => $value];
                }

            break;
            case 'e':

                $x_end = $current_coordinate['x'] + $distance;
                $y_end = $current_coordinate['y'];

                $start = $current_coordinate['x'] + 1;
                foreach(range($start, $x_end) as $value){
                    $coordinates_to_check[] = [ 'x' => $value, 'y' => $current_coordinate['y']];
                }

            break;
            case 's':

                $x_end = $current_coordinate['x'];
                $y_end = $current_coordinate['y'] - $distance;

                $start = $current_coordinate['y'] - 1;
                foreach(range($start, $y_end) as $value){
                    $coordinates_to_check[] = [ 'x' => $current_coordinate['x'], 'y' => $value];
                }

            break;
            case 'w':

                $x_end = $current_coordinate['x'] - $distance;
                $y_end = $current_coordinate['y'];

                $start = $current_coordinate['x'] - 1;
                foreach(range($start, $x_end) as $value){
                    $coordinates_to_check[] = [ 'x' => $value, 'y' => $current_coordinate['y']];
                }

            break;
        }

        // if the traversal meets one of the existing coordinates, then the current move is an interception
        foreach($coordinates_to_check as $xy){

            if(
                isset(
                    $coordinates[
                        $xy['x']
                    ][
                        $xy['y']
                    ]
                )
            ){
                print_r($move);//return $move;
            }

            // add the point to the list of coordinates that has been traversed
            $coordinates[$xy['x']][$xy['y']] = true;

        }

        // update the current coordinate for the next iteration
        $current_coordinate = [
            'x' => $x_end, 
            'y' => $y_end
        ];

    }

    echo -1;

}

//$moves = [1, 3, 2, 5, 4, 4, 6, 3, 2];
//$moves = [4, 4, 5, 7, 8, 6, 5];
$moves = [1, 1, 2, 1, 1];
$turtle_move = logo_turtle($moves); // returns 6
?>