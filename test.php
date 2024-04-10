<!DOCTYPE html>
<html dir="ltr" lang="de-DE">
<head>


<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="year" content="2024" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700%7CRoboto:300,400,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />

    <!-- One Page Module Specific CSS -->
    <link rel="stylesheet" href="css/onepage.css" type="text/css" />

    <!-- Basic Design CSS -->
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/et-line.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="css/fonts.css" type="text/css" />
    
    <!-- Bootstrap Switch CSS -->
    <link rel="stylesheet" href="css/components/bs-switches.css" type="text/css" />
    <!-- Bootstrap Switch CSS -->
    <link rel="stylesheet" href="css/components/bs-select.css" type="text/css" />
    <!-- Bootstrap File Upload CSS -->
    <link rel="stylesheet" href="css/components/bs-filestyle.css" type="text/css" />
    
    <!-- Radio Checkbox CSS -->
    <link rel="stylesheet" href="css/components/radio-checkbox.css" type="text/css" />
    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="css/datepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/components/timepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/components/daterangepicker.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>Pigeon Tree</title>


</head>
<?php
session_start();
require 'config/init.php';
?>
<body class="stretched side-push-panel overlay-menu">

 <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

    <!-- Header
        ============================================= -->
        <header id="header" class="full-header transparent-header static-sticky">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="#" class="standard-logo" data-dark-logo="images/logo.png"><img src="images/logo.png" alt="Pigeon Tree"></a>
                        <a href="#" class="retina-logo" data-dark-logo="images/logo@2x.png"><img src="images/logo@2x.png" alt="Pigeon Tree"></a>

                    </div><!-- #logo end -->

                    <?php
if (isset($_SESSION['msg'])) {
    echo '<h3 class="hero__title" style="margin-top: 14px;">' . $_SESSION['msg'] . '</h3>';
}
?>


                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">

                        <ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="80">
                            <li><a href="logout.php">Logout</a></li>
                            <li><a href="pigeontree.php" data-href="#wrapper"><div>Start 🔝</div></a></li>
                            <li><a href="pigeontree.php" data-href="#create-a-pigeon-tree"><div>Create pigeon tree 📝</div></a></li>
                            <li><a href="test.php" data-href="test.php"><div>DataBase</div></a></li>
                            <li><a href="howto.html" data-href="howto.html"><div>Upload HowTo?</div></a></li>
                        </ul>

                        <a href="#" id="overlay-menu-close" class="visible-lg-block visible-md-block"><i class="icon-line-cross"></i></a>

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->



                    <link rel="stylesheet" href="db.css" type="text/css" />


    <section id="content">

        <div >

            <div class="center page-section">

                 <div >



                 <?php


$dbHandle = new PDO("mysql:host=$host;dbname=$db", $username, $password);
$dbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbHandle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// Перевірка, чи існує ідентифікатор користувача в сесії
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Запит до бази даних для вибірки голубів конкретного користувача
    $sql = "SELECT * FROM pigeons WHERE user_id = :userId";
    $statement = $dbHandle->prepare($sql);
    $statement->execute(["userId" => $userId]);
    $pigeons = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Виведення таблиці голубів
    if (!empty($pigeons)) {
        echo '<table>';
        echo '<thead><tr><th>Number</th><th>Name</th><th>Gender</th><th>Color</th>
        <th>Owner</th><th>Birth Date</th><th>Death Date</th><th>Descendant of</th><th>Paired to</th>
        <th>Additional</th><th>Action</th></tr></thead>';
        echo '<tbody>';
        foreach ($pigeons as $pigeon) :?>
            <tr>
            <td><?php echo $pigeon['number']; ?></td>
            <td><?php echo $pigeon['name']; ?></td>
            <td><?php echo $pigeon['gender']; ?></td>
            <td><?php echo $pigeon['color']; ?></td>
            <td><?php echo $pigeon['owner']; ?></td>
            <td><?php echo $pigeon['birth_date']; ?></td>
            <td><?php echo $pigeon['death_date']; ?></td>
            <td><?php echo $pigeon['descendant_id']; ?></td>
            <td><?php echo $pigeon['paired_id']; ?></td>
            <td><?php echo $pigeon['additional_info']; ?></td>
            <td>
            <button class="button button-circle button-mini button-border" onclick="confirmDelete(<?php echo $pigeon['pigeon_id']; ?>)">Delete</button>
            <button class="button button-circle button-mini button-border" onclick="editPigeon(
    <?php echo $pigeon['pigeon_id']; ?>,
    '<?php echo $pigeon['number']; ?>',
    '<?php echo $pigeon['name']; ?>',
    '<?php echo $pigeon['gender']; ?>',
    '<?php echo $pigeon['color']; ?>',
    '<?php echo $pigeon['owner']; ?>',
    '<?php echo $pigeon['birth_date']; ?>',
    '<?php echo $pigeon['death_date']; ?>',
    '<?php echo $pigeon['descendant_id']; ?>',
    '<?php echo $pigeon['paired_id']; ?>',
    '<?php echo $pigeon['additional_info']; ?>'
)">Edit</button>

        </td>
            </tr>
            <?php endforeach; ?>
       </tbody></table>
        <!-- Кнопка для відміни останньої дії -->
        <!-- <button action="" type="button" class="button button-circle button-small button-border topmargin-sm" id="undoButton">Undo Last Action</button>-->



    <div id="editForm" style="display: none;" >
    <div class="content-wrap nopadding">
    <div class="center page-section">
    <div class="container clearfix">
    <div class="form-process"></div>
    <form class="nobottommargin" method="post" action="" name="editForm">
        <!-- Додайте сюди всі поля, які можна редагувати, наприклад: -->


        <div class="col_one_fifth">
        <label for="id-band">ID Band <small>*</small></label>
        <input type="text" class="sm-form-control" name="number" value="<?php echo $pigeon['number']; ?>"></div>
        <div class="col_one_fifth">
        <label for="name">Name <small>*</small></label>
        <input type="text" class="sm-form-control" name="name" value="<?php echo $pigeon['name']; ?>"></div>
        <div class="col_one_fifth">
        <label for="sex">Sex <small>*</small></label>
        <select id="cbsex" name="sex" class="selectpicker" data-width="100%">
                                        <option value="">Please choose</option>
                                        <option value="cock">Cock</option>
                                        <option value="hen">Hen</option>
       
                                    </select ></div>
       
        <div class="col_one_fifth">
        <label for="color">Color <small>*</small></label>
        <input type="text" class="sm-form-control" name="color" value="<?php echo $pigeon['color']; ?>"></div>
        <div class="col_one_fifth col_last">
        <label for="owner">Owner <small>*</small></label>
        <input type="text" class="sm-form-control" name="owner" value="<?php echo $pigeon['owner']; ?>"></div>


        <div class="col_half">
        <label for="birth">Birth <small>*</small></label>
        <input type="date" class="sm-form-control daterange " name="birth_date" value="<?php echo $pigeon['birth_date']; ?>"></div>
        <div class="col_half col_last">
        <label for="death-true">Death </label>
        <input type="date" class="sm-form-control daterange" name="death_date" value="<?php echo $pigeon['death_date']; ?>"></div>

        <div class="col_one_fourth"></div>
        <div class="col_one_fourth">
        <label for="descendant-of">Descendant of<small>*</small></label>
        <input type="text" class="sm-form-control"  name="descendant_id" value="<?php echo $pigeon['descendant_id']; ?>"></div>
        <div class="col_one_fourth col_last">
        <label for="paired-to">Paired to<small></small></label>
        <input type="text" class="sm-form-control"  name="paired_id" value="<?php echo $pigeon['paired_id']; ?>"></div>
        
        <div class="col_ful col_last">
        <input type="text" class="sm-form-control" name="additional_info" value="<?php echo $pigeon['additional_info']; ?>"></div>
        <input type="hidden" name="pigeon_id" value="<?php echo $pigeon['pigeon_id']; ?>">


        <div class="col_full">
    <input class="button button-circle button-small button-border topmargin-sm" id="savePigeon" type="button" value="Save Changes" />
</div>

    </form>
        </div>
        </div>
        </div>
</div>



<?php
  
    } else {
        echo 'No pigeons found for this user.';
    }
} else {
    echo 'User not logged in.';
}
?>


                    </div>

                    </div>


                    </div>

            </div>

        </div>

    </section><!-- #content end -->

<!-- Footer
        ============================================= -->
        <footer id="footer" class="dark noborder">

            <div class="container center">
                <div class="footer-widgets-wrap">

                    <div class="row divcenter clearfix">

                        <div class="col-md-4">

                            <div class="widget clearfix">
                                <h4>Menu 📇</h4>

                                <ul class="list-unstyled footer-site-links nobottommargin">
                                    <li><a href="logout.php">Logout</a></li>
                                    <li><a href="pigeontree.php" ><div>Start</div></a></li>
                                    <li><a href="pigeontree.php" ><div>Create pigeon tree</div></a></li>
                                    <li><a href="test.php" data-href="test.php"><div>DataBase</div></a></li>
                                    <li><a href="howto.html" data-href="howto.html"><div>Upload HowTo</div></a></li>
                                </ul>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="widget subscribe-widget clearfix" data-loader="button">
                                <h4>Search 🔎</h4>

                                <div class="search"></div>
                                <form id="search" action="../search.php" method="post" class="nobottommargin">
                                    <input type="text" id="search-box" name="name" class="form-control input-lg not-dark required email" placeholder="Search for pigeon">
                                    <button class="button button-border button-circle button-light topmargin-sm" type="submit">Seek now!</button>
                                </form>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="widget clearfix">
                                <h4>Contact 📱</h4>
                                <p class="lead">pigeontree@gmail.com</p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <div id="copyrights">
                <div class="container center clearfix">
                    Copyright 2024 | <a class="grayscale" href="team.html">Project DHBW pigeon tree</a> | All rights reserved
                </div>
                <div class="container center clearfix">
                    <a class="grayscale" href="impressum.html">Imprint</a>
                </div>
            </div>

        </footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
    
    <!-- Bootstrap Switch Plugin -->
    <script type="text/javascript" src="js/components/bs-switches.js"></script>
    <!-- Bootstrap Select Plugin -->
    <script type="text/javascript" src="js/components/bs-select.js"></script>
    <!-- Bootstrap File Upload Plugin -->
    <script type="text/javascript" src="js/components/bs-filestyle.js"></script>
    
    <!-- Date & Time Picker JS -->
    <script type="text/javascript" src="js/components/moment.js"></script>
    <script type="text/javascript" src="js/components/datepicker.js"></script>
    <script type="text/javascript" src="js/components/timepicker.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="js/components/daterangepicker.js"></script>
    
    <!-- Google Recaptcha Plugin -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>  

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="js/functions.js"></script>







    <script>
var lastEditedPigeon = null;


    function confirmDelete(pigeonId) {
        if (confirm("Are you sure you want to delete this pigeon?")) {
            localStorage.setItem('lastAction', JSON.stringify({ type: 'delete', pigeonId: pigeonId }));
            // Видалення голуба при підтвердженні
            window.location.href = 'delete_pigeon.php?id=' + pigeonId;
        }
    }

    function editPigeon(pigeonId, number, name, sex, color, owner, birthDate, deathDate, descendantId, pairedId, additionalInfo) {
        // Отримання елементів форми для редагування
        var editForm = document.getElementById('editForm');
        var numberInput = editForm.querySelector('[name="number"]');
        var nameInput = editForm.querySelector('[name="name"]');
        var sexInput = editForm.querySelector('[name="sex"]');
        var colorInput = editForm.querySelector('[name="color"]');
        var ownerInput = editForm.querySelector('[name="owner"]');
        var birthDateInput = editForm.querySelector('[name="birth_date"]');
        var deathDateInput = editForm.querySelector('[name="death_date"]');
        var descendantIdInput = editForm.querySelector('[name="descendant_id"]');
        var pairedIdInput = editForm.querySelector('[name="paired_id"]');
        var additionalInfoInput = editForm.querySelector('[name="additional_info"]');
        var pigeonIdInput = editForm.querySelector('[name="pigeon_id"]');


    // Зберігаємо попередні дані
    lastEditedPigeon = {
        pigeonId: pigeonIdInput.value,
        number: numberInput.value,
        name: nameInput.value,
        sex: sexInput.value,
        color: colorInput.value,
        owner: ownerInput.value,
        birthDate: birthDateInput.value,
        deathDate: deathDateInput.value,
        descendantId: descendantIdInput.value,
        pairedId: pairedIdInput.value,
        additionalInfo: additionalInfoInput.value
    };

        // Заповнення значень полів форми з отриманими даними голуба
        numberInput.value = number;
        nameInput.value = name;
        sexInput.value = sex;
        colorInput.value = color;
        ownerInput.value = owner;
        birthDateInput.value = birthDate;
        deathDateInput.value = deathDate;
        descendantIdInput.value = descendantId;
        pairedIdInput.value = pairedId;
        additionalInfoInput.value = additionalInfo;
        pigeonIdInput.value = pigeonId;

        // Показ форми редагування
        editForm.style.display = 'block';

        localStorage.setItem('lastAction', JSON.stringify({ type: 'edit', pigeonId: pigeonId }));
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Додавання обробника події для кнопки
        document.getElementById("savePigeon").addEventListener("click", function () {
           
                savePigeon();
            
        });

        document.getElementById("undoButton").addEventListener("click", function () {
           
           undoLastAction();
       
   });

        function savePigeon() {
    // Отримання елементів форми
    var numberInput = document.forms["editForm"]["number"];
    var nameInput = document.forms["editForm"]["name"];
    var sexInput = document.forms["editForm"]["sex"];
    var colorInput = document.forms["editForm"]["color"];
    var ownerInput = document.forms["editForm"]["owner"];
    var birthDateInput = document.forms["editForm"]["birth_date"];
    var deathDateInput = document.forms["editForm"]["death_date"];
    var descendantIdInput = document.forms["editForm"]["descendant_id"];
    var pairedIdInput = document.forms["editForm"]["paired_id"];
    var additionalInfoInput = document.forms["editForm"]["additional_info"];
    var pigeonIdInput = document.forms["editForm"]["pigeon_id"];

    // Перевірка, чи всі необхідні елементи форми існують
    if (!numberInput || !nameInput || !sexInput || !colorInput || !ownerInput || !birthDateInput || !deathDateInput || !descendantIdInput || !pairedIdInput || !additionalInfoInput || !pigeonIdInput) {
        console.error("One or more form elements are missing.");
        return;
    }

    // Підтвердження збереження змін
    if (confirm("Are you sure you want to save changes?")) {
        // Відправка форми
        document.forms["editForm"].submit();
        
        // Додано: Виклик edit_pigeon.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "edit_pigeon.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Формуємо дані для передачі на сервер (залежно від вашого варіанту)
        var formData = "number=" + encodeURIComponent(numberInput.value) +
                        "&name=" + encodeURIComponent(nameInput.value) +
                        "&sex=" + encodeURIComponent(sexInput.value) +
                        "&color=" + encodeURIComponent(colorInput.value) +
                        "&owner=" + encodeURIComponent(ownerInput.value) +
                        "&birth_date=" + encodeURIComponent(birthDateInput.value) +
                        "&death_date=" + encodeURIComponent(deathDateInput.value) +
                        "&descendant_id=" + encodeURIComponent(descendantIdInput.value) +
                        "&paired_id=" + encodeURIComponent(pairedIdInput.value) +
                        "&additional_info=" + encodeURIComponent(additionalInfoInput.value) +
                        "&pigeon_id=" + encodeURIComponent(pigeonIdInput.value);

        // Відправка даних на сервер
        xhr.send(formData);
    }
}

function undoLastAction() {
    var lastAction = JSON.parse(localStorage.getItem('lastAction'));

    if (lastAction) {
        var confirmation = confirm('Are you sure you want to undo the last action?');

        if (confirmation) {
            if (lastAction.type === 'delete') {
                // Відновлення видаленого голуба
                window.location.href = 'undo_delete_pigeon.php?id=' + lastAction.pigeonId;
            } else if (lastAction.type === 'edit') {
                fetch('undo_edit_pigeon.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'pigeonId=' + lastAction.pigeonId,
                        })
                            .then(response => response.json())
                            .then(data => {
                                alert(data.message);
                                
                            });
                            // location.reload();
            }

            localStorage.removeItem('lastAction');
        }
    } else {
        alert('No action to undo.');
    }
}

    });




    function fillFormWithData(pigeonData) {
    // Заповнення значень полів форми з отриманими даними голуба
    Object.keys(pigeonData).forEach(key => {
        var input = document.querySelector('[name="' + key + '"]');
        if (input) {
            input.value = pigeonData[key];
        }
    });
}


</script>


</body>
</html>