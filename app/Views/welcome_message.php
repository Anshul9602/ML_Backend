<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Maa-Laxmigame</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- STYLES -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>


   
</head>

<body>


    <section class="sec-logo">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
                        <a href="#"><img style="padding-top: 6px;" class="img-fluid" width="220" src="image/apk.png"
                                alt="apk-img"></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="logo">
                        <a href="#"><img style="padding-top: 6px;" class="img-fluid" width="220" src="image/logo.png"
                                alt="apk-logo"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-disclaimer">
        <h4 style="color:#FFF;">-:DISCLAIMER:-</h4>
        <p style="color:#fff;">We strictly recommend you to please visit and browse this site on your own risk. All the
            information available here is strictly for informational purposes and based on astrology and numerology
            calculations. We are no way associated or affiliated with any illegal Matka business. We abide by rules and
            regulations of the regions where you are accessing the website. May be it is illegal or banned in your
            region. If you are using our website despite ban, you will be solely responsible for the damage or loss
            occurred or legal action taken. Please leave our website immediately if you dont like our disclaimer.
            Copying any information / content posted on the website is strictly prohibited and against the law.</p>
    </section>
    <section class="sec-liveresult">
        <div class="liveresult">
            <h4 class="title">☔ &nbsp;&nbsp; LIVE RESULT &nbsp;&nbsp; ☔</h4>
            You are online
            
            <div class="result">
            <?php   foreach ($post as $game){   
                  ?>
                <div class="result-sec">
                    <h4 style="margin-bottom:0;"><?php print_r($game['g_title']) ?> (<?php print_r($game['g_name_hindi']) ?> )</h4>
                    <h5><?php print_r($game['open_num']) ?>-<?php print_r($game['start']) ?><?php print_r($game['end']) ?>-<?php print_r($game['close_num']) ?></h5>
                    <h6><?php print_r($game['open_t']) ?> &nbsp;&nbsp; <?php print_r($game['close_t']) ?></h6>
                </div>

               <?php } ?>
                
                    
            </div>
            <h5>Sabse Tezz Live Result Yahi Milega</h5>
        </div>
    </section>
    <section class="sec-ad">
        <div>KALYAN MATKA | MATKA RESULT | KALYAN MATKA TIPS | SATTA MATKA | MATKA.COM | MATKA PANA JODI TODAY </div>
    </section>
    <section class="sec-fast">
        <h4 class="title">WORLD ME SABSE FAST SATTA MATKA RESULT</h4>
        <div class="fast">
            <div class="result-sec row">
                <div class=" col-md-11 col-sm-10 col-8">
                    <h4 style="margin-bottom: 0;">MILAN MORNING ( मिलन मॉर्निंग )</h4>
                    <h5>799-56-790</h5>
                    <h6>10:00 AM &nbsp;&nbsp; 11:00 AM</h6>
                </div>
                <div class="col-md-1 col-sm-2 col-4">
                    <a href="panel-chart.php?gameId=1" class="btn_chart">Panel</a>
                </div>
            </div>
            <!-- <div class="result-sec row">
                <div class="col-md-11 col-sm-10 col-8">
                <h4 style="margin-bottom: 0;">MILAN MORNING  ( मिलन मॉर्निंग )</h4>
                <h5>799-56-790</h5>
                <h6>10:00 AM &nbsp;&nbsp; 11:00 AM</h6></div>
                <div class="col-md-1 col-sm-2 col-4">
                    <a href="panel-chart.php?gameId=1" class="btn_chart">Panel</a>
                </div>
                </div> -->
        </div>
        </div>
    </section>
    <section class="sec-enquiry">
        <div class="container p-2">
            <div class="row d-flex" style="align-items: center;">
                <div class="col-md-6 enquiry">
                    <p>Email for any Enquiries Or Support:</p>
                </div>
                <div class="col-md-6 e-mail">
                    <a href="mailto:support@xyz.com">mhalaxmi@gmail.com</a>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-jodichart">
        <h4>SATTA MATKA JODI CHART</h4>
        <a href="#">MILAN MORNING CHART</a>
    </section>
    <section class="sec-panelchart">
        <h4>MATKA PANEL CHART</h4>
        <a href="#">MILAN MORNING CHART</a>
    </section>
    <a class="refresh btn-lr" href="https://maalaxmigame.in/" onclick="window.location.reload()"
        class="refresh-btn btm-btn-f">REFRESH </a>
    <a class="matkaplay btn-lr" rel="noreferrer" style="position: fixed;bottom: 10px;right: auto;left: 10px;"
        href="https://play.google.com/store/apps/details?id=com.maalaxmimatkagame.maalaxmimatka"
        class="telegram1 refresh-btn btm-btn-f" target="_blank">Matka Play</a>


    <!-- SCRIPTS -->

    <script>
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>

    <!-- -->

</body>

</html>