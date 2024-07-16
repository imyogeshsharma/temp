<?php

    include('init.php');
    include('master.php');
    $data = '<option value="">Select Time Slot</option>';
    if(isset($_POST['date'])){
        $date = $_POST['date']??date('Y-m-d');

        $booked = array();
        $get_data_enq = mysqli_query($con,"SELECT * FROM `enqiry` WHERE `status` = '1' AND `date` = '".$date."'");
        while($get_data_enq1 = mysqli_fetch_array($get_data_enq)){
            $thisar = explode(',,', $get_data_enq1['time_slot']);
            $booked = array_merge($booked, $thisar);
            
        }
        
        date_default_timezone_set('Asia/Kolkata');
        $start = strtotime('11:00');
        $end = strtotime('23:00');
        for ($i = $start; $i <= $end; $i += 3600) {
            $selected = '';
            $threeHoursFromNow = strtotime('+3 hours');
            if(in_array(date('h:i A', $i) .' - '. date('h:i A', $i + 3600), $booked)){
                $selected = 'disabled';
            }
            $data .= '<option value="' . date('h:i A', $i) .' - '. date('h:i A', $i + 3600) . '" '.$selected.' >' . date('h:i A', $i) .' - '. date('h:i A', $i + 3600) . '</option>';
        }
    }

    echo $data;
    
        
        // $to         = [4,7,9,3];
        // $from       = [5,4,8,10];
        
        // $html = '<br>
        // <label>Reserved Slot for '.date("d-m-Y",strtotime($_REQUEST['date'])).'</label>
        // <table width="100%" id="slots-show">
        //     <tr>
        //         <th>Sr No</th>
        //         <th>From</th>
        //         <th>To</th>
        //     </tr>
        //     <tr>
        //         <td>1</td>
        //         <td>11:00 AM</td>
        //         <td>12:00 PM</td>
        //     </tr>
        //     <tr>
        //         <td>1</td>
        //         <td>11:00 AM</td>
        //         <td>12:00 PM</td>
        //     </tr>
        //     <tr>
        //         <td>1</td>
        //         <td>11:00 AM</td>
        //         <td>12:00 PM</td>
        //     </tr>
        //     <tr>
        //         <td>1</td>
        //         <td>11:00 AM</td>
        //         <td>12:00 PM</td>
        //     </tr>
        // </table>';
        
        
        
        //  $res = [
        //     'to'    => $to,
        //     'from'  => $from,
        //     'html'  => $html
        //     ];
            
        // echo json_encode($res);
        
?>