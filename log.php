<?php
/**
 * Created by PhpStorm.
 * User: Aamir Khan
 * Date: 10/30/2019
 * Time: 12:07 AM
 */
include_once('functions.php');
include_once ('timezone.php');

$json = file_get_contents('data.json');
$data = json_decode($json, true);


if (is_array($data)){

    krsort($data);

}

switch ($_GET['mode']){

    case "status":

        $id = $_GET['id'];
        $data[$id]['status'] = 1;
        save($data);

        break;

    case "restore":

        if(is_array($data)) {

            foreach ($data as $task) {

                if ($task['status'] != 1) {

                    ?>
                    <tr>
                        <td><?php echo $task["name"]; ?></td>
                        <td><?php echo formated_date($task["date_start"]); ?></td>
                        <td>
                            <?php
                            if ($task["date_end"] != "") {
                                echo formated_date($task["date_end"]);
                            }
                            ?>
                        </td>
                        <td>
                            <?php

                            if ($task["date_end"] == "") {
                                echo formated_time(time() - $task["date_start"]);
                            } else {
                                echo formated_time($task['date_end'] - $task["date_start"]);
                            }

                            ?>

                        </td>
                        <td class="btn-col">-</td>
                        <td class="btn-col"><button data-id="<?php echo $task['id']; ?>"
                                                 class="btn btn-sm btn-restore"><?php echo icon('fa-redo'); ?></button></td>
                    </tr>
                    <?php
                }
            }
        }
        break;

    case "remove":

        $id = $_GET['id'];
        $data[$id]['status'] = 2;
        save($data);

        break;

    case "stop":

        $id = $_GET['id'];
        $data[$id]["date_end"] = time();
        save($data);

        break;

    case "new":

        $time = time();
        $data[$time]['id'] = $time;
        $data[$time]['name'] = $_GET['name'];
        $data[$time]['date_start'] = $time;
        $data[$time]['date_end'] = '';
        $data[$time]['status'] = 1;
        save($data);

        break;

    # fill out the table
    case "build":
        if(is_array($data)) {

            foreach ($data as $task) {

                if ($task['status'] != 2) {

                    ?>
                    <tr>
                        <td><?php echo $task["name"]; ?></td>
                        <td><?php echo formated_date($task["date_start"]); ?></td>
                        <td>
                            <?php
                            if ($task["date_end"] != "") {
                                echo formated_date($task["date_end"]);
                            }
                            ?>
                        </td>
                        <td>
                            <?php

                            if ($task["date_end"] == "") {
                                echo formated_time(time() - $task["date_start"]);
                            } else {
                                echo formated_time($task['date_end'] - $task["date_start"]);
                            }

                            ?>

                        </td>
                        <td class="btn-col"><button data-id="<?php echo $task['id']; ?>"
                                  class="btn btn-sm btn-stop" <?php echo ($task['date_end'])!=""?"disabled":""; ?>> <?php echo icon('fa-stop'); ?> </button></td>
                        <td class="btn-col"><button data-id="<?php echo $task['id']; ?>"
                                  class="btn btn-sm btn-remove"><?php echo icon('fa-trash'); ?></button></td>
                    </tr>
                    <?php
                }
            }
        }
        break;

    case "tally":
            $count = 0;
            if(is_array($data)) {

                foreach ($data as $task) {

                    if($task["date_end"] == "" ) {

                        $task['date_end'] = time();
                        $count += ($task["date_end"] - $task["date_start"]);
                    }

                    else if ($task["date_end"] != "" && $task['status'] != 2) { //for non numeric conversion error
                        $count += ($task["date_end"] - $task["date_start"]);
                    }



                }
            }
            echo formated_time($count);
        break;


}


?>