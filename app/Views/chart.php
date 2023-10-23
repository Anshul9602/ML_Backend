<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Panel Chart</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- STYLES -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

<style>
    /*Tables*/
    .my-table table {
        border-collapse: collapse;
        width: 100%;
        background-color: #fff;
    }
    .vertical_text {
        vertical-align: middle;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }
    .my-table thead {
       
        font-size: 16px;
    }
    .my-table tbody {
        font-size: 16px;
    }
    .my-table th, .my-table td {
        padding: 0px 0px;
        font-size: 18px;
        font-weight: 900;
        color: #000 !important;
    }
    
    .my-table th, .my-table td {
        border: 2px solid gray;
    }
table {
    margin-bottom: 30px;
}

table th,
table td {
    padding: 15px;
    vertical-align: middle;
    background-color: var(--thm-white);
}

table th {
    font-weight: 500;
    color: var(--thm-color-two);
    font-size: 16px;
    border: 1px solid var(--thm-border);
}

table {
    /* width: 100%; */
    /* margin-bottom: 30px; */
}

table td {
    border: 1px solid var(--thm-border);
}

table img {
    width: 40px;
    border-radius: 0;
}

.mb-xl-20 {
    margin-bottom: 20px;
}

.mb-xl-30 {
    margin-bottom: 30px;
}

.mb-xl-60 {
    margin-bottom: 60px;
}
body {
    background-color: #053B50;
    text-align: center;
    padding: 3px 10px;
    margin: 0;
    scroll-behavior: smooth;
    font-style: italic;
    font-family: Helvetica, sans-serif;
    font-weight: 700;
}
</style>

</head>

<body>

        

    <section class="sec-logo">
        <div class="container">
            <div class="row" style="padding:10%;">
                <h1 style="color:#fff;">
                <?php print_r($tt) ?>(<?php print_r($tth) ?>)
                </h1>
                
            </div>
        </div>
    </section>

    <section class="my-table align-self-center row" style="    padding: 0 20px;">
      
        <?php   foreach ($post as $game){   
            ?>
        <div class="col-md-2 col-4 text-center " style="    border: 1px solid #fff;    padding: 10px;    color: #fff;">
            <h6>Date: <?php print_r($game['result_date']) ?></h6>
            <h2 class="bold"><?php print_r($game['start']) ?><?php print_r($game['start']) ?></h2>
        </div>
        <?php } ?>
       </div>
       
    </section>



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