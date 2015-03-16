<!Document>
<html>
    <head>
        <style>
            .day-title{
                text-align: center;
            }
            .print_footer, .print_header{
                position: relative;
                background: url(/asset/public/images/print_footer.png) #FFF no-repeat center;
                height: 100px; /* put the image height here */
                width: 100%; /* put the image width here */
                bottom: 0;
                 -webkit-print-color-adjust: exact; 

            }
            .print_header{
                background: url(/asset/public/images/print_header.png) #FFF no-repeat center;
                 -webkit-print-color-adjust: exact; 
                bottom: auto;
                top:0;
            }
            body{
                background: url(/asset/public/images/print_body.png) #FFF no-repeat center;
                 -webkit-print-color-adjust: exact; 
                 padding:0 45px;
            }
            p{
                text-indent: 50px;
            }
   


        </style>

    </head>
    <body>
        <div class="print_header"></div>
        <p>
            Dear Passengers !
        </p>
        <p>
            We appreciate your trust in us and we appreciate the opportunity to serve you. Adopting the motto "Travel with all the senses", "Every trip is an experience". Genuine Tour Viet Nam aims to bring you the best experience of culture, life, 
            people and beautiful landscape of Vietnam through
        </p>
        <ul>
            <li>Feel fresh air,</li>
            <li>Enjoy tasty food, </li>
            <li>Great touch landscapes,</li>
            <li>Grasp amazing moments, </li>
            <li>Hear the life circulation.</li>
        </ul>

        <p>
            With the desire to make a genuine tour with interesting and meaningful memories and to ensure that you fully understand your journey we’d like to give you the tour itinerary as bellow:
        </p>

        <h2 style="text-align: center">TOUR ITINERARY</h2>
        <p>Name: <?php echo mb_strtoupper($customer_name);?></b></p>
        <p>Quantity of pax: <b><?php echo $order_customer_number;?></b></p>
        <p>Departure day: <b><?php echo $order_from_date;?></b></p>
        <p>Return day: <b><?php echo $order_to_date;?></b> </p>
        <p>Duration: <b><?php echo date_diff(date_create($order_to_date),date_create($order_from_date))?></b></p>

        <?php
        $count = 0;
        foreach($order_item_date as $date_data){
            $count ++;
            ?>
             <div class="day">
                <h3 class="day-title">Day <?php echo $count;?></h3>
                <div>Time Start: <?php echo $date_data['date']?></div>
                <?php foreach($date_data['cruise'] as $cruise):?>
                    <h4><div>Departure: <?php echo $cruise['from'];?></div>
                    <div>Arrival: <?php echo $cruise['to'];?></div></h4>
                    
                    <div>Mean of Transportation: </div>
                    <?php 
                        foreach($cruise['cruise-data']['restaurent'] as $restaurent){
                            echo '<div>'.$restaurent['description'] . ":  " . $restaurent['name'] . '</div>';
                        }
                    ?>
                    <div>Accomodation: <?php echo $cruise['cruise-data']['hotel']?></div>
                    <div>Visit: <?php echo $cruise['cruise-data']['tour']?></div>
                <?php endforeach;?>
               
                
                
                
            <div>Insurance: </div>
        </div>
        <?php }
        ?>
       


        <p>
            We commit to provide you the best service as we said. 
        </p>
        <p>
            We hope you have enjoyed your traveling with our services and had a pleasant If there is anything else we can do to make your trip more comfortable and memorable, please do not hesitate to contact us. 
        </p>
        <p>
            In the coming time, should you, your family, relatives or friends plan holidays to Vietnam, Laos and Cambodia, please feel free to let us know. 
        </p>
        <p>
            We are always available to assist you travel in your own style, at your pace!    
        </p>
        <p>
            Wishing you an enjoyable stay & good trip home!
        </p>
        <div class="print_footer"></div>
    </body>
</html>