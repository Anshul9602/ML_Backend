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
</style>

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

    <section class="my-table align-self-center">
        <table>
            <caption>MILAN MORNING Time 10:00 AM To 11:00 AM PANEL CHART 2023</caption>
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Mon</th>
                    <th scope="col">Tue</th>
                    <th scope="col">Wed</th>
                    <th scope="col">Thu</th>
                    <th scope="col">Fri</th>
                    <th scope="col">Sat</th>
                    <th scope="col">Sun</th>
                </tr>
            </thead>
           <tbody>
            <td>
                01-07-2021 <br> to <br>
                07-07-2021 </td>

            <td>
                <div class="vertical_text">
                    <span>
                        <p class="dnd-panel-tdp w3-text-red" style="margin-bottom:0px!important;">
                            <strong>*</strong><br><strong>*</strong><br><strong>*</strong><br></p>
                    </span>
                    <span style="vertical-align:middle;">
                        <p class="dnd-panel-tdp  dnd-fonts" style="margin-bottom:0px!important;">
                            <strong>**</strong></p>
                    </span>
                    <span>
                        <p class="dnd-panel-tdp w3-text-red" style="margin-bottom:0px!important;">
                            <strong><strong>*</strong><br><strong>*</strong><br><strong>*</strong><br></strong>
                        </p>
                    </span>
                </div>
            </td>
           </tbody>
        </table>
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