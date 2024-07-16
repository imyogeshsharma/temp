        <?php

        require('init.php');
        
        include('master.php');
        // index value for time slot
        /*
        from time slot
        1 => 11:00 AM
        2 => 12:00 PM
        3 => 01:00 PM
        4 => 02:00 PM
        5 => 03:00 PM
        6 => 04:00 PM
        7 => 05:00 PM
        8 => 06:00 PM
        9 => 07:00 PM
        10 => 08:00 PM
        11 => 09:00 PM
        12 => 10:00 PM

        to time slot
        1 => 12:00 PM
        2 => 01:00 PM
        3 => 02:00 PM
        4 => 03:00 PM
        5 => 04:00 PM
        6 => 05:00 PM
        7 => 06:00 PM
        8 => 07:00 PM
        9 => 08:00 PM
        10 => 09:00 PM
        11 => 10:00 PM
        12 => 11:00 PM
        */
        $fromkey = [
            1 => '11:00 AM',
            2 => '12:00 PM',
            3 => '01:00 PM',
            4 => '02:00 PM',
            5 => '03:00 PM',
            6 => '04:00 PM',
            7 => '05:00 PM',
            8 => '06:00 PM',
            9 => '07:00 PM',
            10 => '08:00 PM',
            11 => '09:00 PM',
            12 => '10:00 PM'
        ];
        $tokey = [
            1 => '12:00 PM',
            2 => '01:00 PM',
            3 => '02:00 PM',
            4 => '03:00 PM',
            5 => '04:00 PM',
            6 => '05:00 PM',
            7 => '06:00 PM',
            8 => '07:00 PM',
            9 => '08:00 PM',
            10 => '09:00 PM',
            11 => '10:00 PM',
            12 => '11:00 PM'
        ];
        $html = '<br>
                    <label>Reserved Slot for ' . date("d-m-Y", strtotime($_REQUEST['date'])) . '</label>
                    <table width="100%" id="slots-show">
                        <tr>
                            <th>Sr No</th>
                            <th>From</th>
                            <th>To</th>
                        </tr>';
        $to         = [];
        $from       = [];
        if (isset($_POST['date'])) {
            $date = $_POST['date'] ?? date('Y-m-d');
            $sr = 1;
            $booked = array();
            $get_data_enq = mysqli_query($con, "SELECT * FROM `enqiry` WHERE `status` = '1' AND `date` = '" . $date . "'");
            while ($get_data_enq1 = mysqli_fetch_array($get_data_enq)) {
                $thisar = explode(',,', $get_data_enq1['time_slot']);
                //$booked = array_merge($booked, $thisar);
                $html .= '
                    <tr>
                        <td>' . $sr++ . '</td>
                        <td>'.$thisar[0].'</td>
                        <td>'.$thisar[1].'</td>
                    </tr>';


                //get difference between two time
                $fromtime = strtotime($thisar[0]);
                $totime = strtotime($thisar[1]);
                $diff = $totime - $fromtime;
                $diff = $diff / 60;
                $diff = $diff / 60;


                if(array_search($thisar[0], $fromkey)){
                    //push key to array
                    $from[] = array_search($thisar[0], $fromkey);

                    //get last key inserted
                    $last_key = end($from);
                    //push key to array of next time
                    for($i = 1; $i < $diff; $i++){
                        $from[] = $last_key + $i;
                    }
                    
                }

                if(array_search($thisar[1], $tokey)){
                    //push key to array
                    $to[] = array_search($thisar[1], $tokey);
                    //get last key inserted
                    $last_key = end($to);
                    //push key to array of previous time
                    for($i = 1; $i < $diff; $i++){
                        $to[] = $last_key - $i;
                    }
                }

                
            }
            $countno = mysqli_num_rows($get_data_enq);
            if ($countno == 0) {
                $html .= '
                    <tr>
                        <td colspan="3">No Slot Reserved</td>
                    </tr>';
            }

        }
        
        $html .= '</table>';



        


        
        $res = [
            'to'    => $to,
            'from'  => $from,
            'html'  => $html
        ];

        echo json_encode($res);
        ?>
        
        