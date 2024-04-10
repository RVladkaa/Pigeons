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

                    <!-- Login Message
                    ============================================= -->
                    <?php
require_once "config/config.php";




$loggedIn = isset($_SESSION['msg']);
if (isset($_SESSION['msg'])) {
    echo '<h3 class="hero__title">' . $_SESSION['msg'] . '</h3>';

  echo "User ID: " . $_SESSION['user_id']; 
    
}



?>
                    

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">

                        <ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="80">
                         <?php
                            
                            if ($loggedIn) {
                                echo '<li><a href="logout.php">Logout</a></li>';
                              } else {
                                echo '<li><a href="Views/login.php">Sign in</a></li>';
                                 }
                        ?> 
                            <li><a href="#wrapper" data-href="#wrapper"><div>Start 🔝</div></a></li>
                            <li><a href="#create-a-pigeon-tree" data-href="#create-a-pigeon-tree"><div>Create pigeon tree 📝</div></a></li>
                            <?php
                            
                            if ($loggedIn) {
                                echo '<li><a href="test.php" data-href="test.php"><div>DataBase</div></a></li>';
                            }else{
                                echo '';
                            }
                            ?>
                            <li><a href="howto.html" data-href="howto.html"><div>Upload HowTo ?</div></a></li>
                        </ul>

                        <a href="#" id="overlay-menu-close" class="visible-lg-block visible-md-block"><i class="icon-line-cross"></i></a>

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->

        <!-- Slider
        ============================================= -->
        <section id="slider" class="slider-parallax full-screen force-full-screen">

            <div class="slider-parallax-inner">

                <div class="full-screen force-full-screen section nobg nopadding nomargin noborder ohidden">
                    <div class="container clearfix">

                        <div class="vertical-middle center">
                            <div class="counter center opm-large-counter"><span data-from="2024" data-to="1250" data-refresh-interval="100" data-speed="1000000"></span></div>
                        </div>

                        <div class="vertical-middle center">
                            <div class="emphasis-title nobottommargin">
                                <h1 class="uppercase t600" style="font-size: 75px; letter-spacing: 15px;">Pigeon Tree</h1>
                                <p class="lead nobottommargin">Create a pigeon tree with just one click!</p>
                                <a class="button button-border button-circle button-black topmargin-lg" href="#" data-scrollto="#create-a-pigeon-tree" data-easing="easeInOutExpo" data-speed="2000" data-offset="80">Let's go!</a>
                            </div>
                        </div>

                    </div>
                </div>

                <a href="#" data-scrollto="#create-a-pigeon-tree" data-easing="easeInOutExpo" data-speed="1750" data-offset="70" class="one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>

            </div>

        </section><!-- #slider end -->

        <script defer src="js/components/bs-switches.js"></script>
<script defer src="js/components/bs-select.js"></script>
<script defer src="js/components/bs-filestyle.js"></script>

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap nopadding">

                <div class="center page-section">

                    <div class="container clearfix">

                        <h2 id="create-a-pigeon-tree" class="divcenter bottommargin font-body" style="max-width: 700px; font-size: 40px;">Create pigeon tree</h2>

                            <div class="form-process"></div>
                                   
                            <form class="nobottommargin" id="pigeon-tree-form" name="pigeon-tree-form" action="CombinedProcess.php" method="post" enctype="multipart/form-data">
                               
                                <div id="readroot">                              
                                
                                <h2 class="topmargin-sm">Add pigeon</h2>
                                
                                <div class="clear"></div>
                                                              
                                <div class="col_one_fifth">
                                    <label for="id-band">ID Band <small>*</small></label>
                                    <input type="text" id="txtidband" name="" value="" class="sm-form-control " />
                                </div>

                                <div class="col_one_fifth">
                                    <label for="name">Name <small>*</small></label>
                                    <input type="text" id="txtname" name="" value="" class="sm-form-control " />
                                </div>
                                
                                <div class="col_one_fifth">
                                    <label for="sex">Sex <small>*</small></label>
                                    <select id="cbsex" name="sex" class="selectpicker" data-width="100%">
                                        <option value="">Please choose</option>
                                        <option value="cock">Cock</option>
                                        <option value="hen">Hen</option>
                                    </select>
                                </div>

                                <div class="col_one_fifth">
                                    <label for="color">Color <small>*</small></label>
                                    <input type="text" id="txtcolor" name="" value="" class="sm-form-control " />
                                </div>

                                <div class="col_one_fifth col_last">
                                    <label for="owner">Owner <small>*</small></label>
                                    <input type="text" id="txtowner" name="" value="" class="sm-form-control " />
                                </div>
                               
                                <div class="col_half">
                                    <label for="birth">Birth <small>*</small></label>
                                    <input type="date" id="dpbirth" name="" class="sm-form-control daterange " value="" />
                                </div>
                                
                                <div class="col_half col_last">
                                    <!--<input type="checkbox" class="checkbox-style" name="death-true" id="death-true"/>-->
                                    <label for="death-true">Death<!--<sup> klick!</sup>--></label>
                                    <input type="date" id="dpdeath" name="" class="sm-form-control daterange" value=""/>
                                </div>

                                <div class="clear"></div>
                                
                                <div class="col_one_fourth"></div>
                                <div class="col_one_fourth">
                                    <label for="descendant-of">Descendant of<small>*</small></label>
                                    <select name="" id="cbdescendant" class="selectpicker daterange" data-live-search="true" data-max-options="2" data-width="100%" multiple />
                                      
                                    </select>
                                </div>
                                
                                <div class="col_one_fourth col_last">
                                    <label for="paired-to">Paired to<small></small></label>
                                    <select name="" id="paired-to" class="selectpicker daterange" data-live-search="true" data-max-options="1" data-width="100%" multiple />
                                      
                                    </select>
                                </div>

                                <div class="clear"></div>

                                <div class="col_ful col_last">
                                    <label for="additional">Additional <small></small></label>
                                    <input type="text" id="txtadditional" name="" value="" class="sm-form-control " />
                                </div>

                                <input type="text" style="display:none;" name="idbands" id="idbandfrm"/>
                                <input type="text" style="display:none;" name="names" id="namefrm"/>
                                <input type="text" style="display:none;" name="sexes" id="sexesfrm"/>
                                <input type="text" style="display:none;" name="colors" id="colorfrm"/>
                                <input type="text" style="display:none;" name="owners" id="ownerfrm"/>
                                <input type="text" style="display:none;" name="births" id="birthsfrm"/>
                                <input type="text" style="display:none;" name="deaths" id="deathsfrm"/>
                                <input type="text" style="display:none;" name="descendants" id="descendantsfrm"/>
                                <input type="text" style="display:none;" name="pairs" id="pairsfrm"/>
                                <input type="text" style="display:none;" name="additional" id="additionalfrm"/>
                                
                                <div class="clear"></div>
                                
                                
                                
                                <div class="clear"></div>
                                
                                </div>                               
                         
                                <span id="writeroot"></span>
                                <div class="clear"></div>
                                
                                <div class="col_full">
                                    <input class="button button-circle button-small button-border topmargin-sm" id="btnaddpigeon" type="button" onclick="" value="Add additional pigeon" />
                                </div>
                                
                                <h2 class="divcenter bottommargin topmargin">XML upload for a large pigeon tree<a href="howto.html" class="grayscale"><sup>HowTo</sup></a></h2>
                                
                            

                                <div class="col_full">
                                    <label>XML - Upload</label><br>
                                    <input id="upload-xml" name="upload-xml" type="file" multiple class="file-loading">
                                    <div id="errorBlock" class="help-block"></div>
                                </div>
                                
                                
                                
                                <div class="col_full hidden">
                                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                                </div>

                                <div class="col_full">
                                    <button class="button button-xlarge button-black button-circle button-border" type="submit" name="submit" id="submit">Create pigeon tree</button>
                                </div>
                                
                            </form>
                            
                        <div class="clear"></div>





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
                                <?php
                            
                            if ($loggedIn) {
                                echo '<li><a href="logout.php">Logout</a></li>';
                              } else {
                                echo '<li><a href="Views/login.php">Sign in</a></li>';
                                 }
                        ?> 
                                    <li><a href="#wrapper" data-href="#wrapper"><div>Start</div></a></li>
                                    <li><a href="#create-a-pigeon-tree" data-href="#create-a-pigeon-tree"><div>Create pigeon tree</div></a></li>
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

    
    

    <script type="text/javascript">

    </script>
    <script type="text/javascript">
    $index = 1;
    
    var idbands = [];
    var names = [];
    var sexes = [];
    var colors = [];
    var owners = [];
    var descendants = [];
    var pairs = [];
    var births = [];
    var deaths = [];
    var additional = [];
    

   

    $("#btnaddpigeon" ).click(function() {
    if($('#dpbirth').val().length>0 && $('#txtidband').val().length>0 && $('#txtname').val().length>0 && $('#cbsex').val().length>0  && $('#txtcolor').val().length>0 && $('#txtowner').val().length>0){
        try{
        births.push($('#dpbirth').val());
        deaths.push($('#dpdeath').val());
        idbands.push($('#txtidband').val());
        names.push($('#txtname').val());
        colors.push($('#txtcolor').val());
        owners.push($('#txtowner').val());
        additional.push($('#txtadditional').val());
        
        
        
        var e = document.getElementById("cbsex");
        var strUser = e.options[e.selectedIndex].value;
        sexes.push(strUser);
        
        
        e = document.getElementById("cbdescendant");
        if(e.selectedIndex!=-1){
        strUser = e.options[e.selectedIndex].value;
        }else{
        strUser = -1;
        }
        descendants.push(strUser);
        
        
        e = document.getElementById("paired-to");
        if(e.selectedIndex!=-1){
        strUser = e.options[e.selectedIndex].value;
        }else{
        strUser = -1;
        }
        pairs.push(strUser);
        
        $('#cbdescendant').append($('<option>', {
                        value:$index,
                        text: ($('#txtidband').val() +" "+ $('#txtname').val())
                    }));
        $('#paired-to').append($('<option>', {
                        value:$index,
                        text: ($('#txtidband').val() +" "+ $('#txtname').val())
                    }));
                    
                    
        document.getElementById("idbandfrm").value = JSON.stringify(idbands);
        document.getElementById("namefrm").value = JSON.stringify(names);
        document.getElementById("sexesfrm").value = JSON.stringify(sexes);
        document.getElementById("colorfrm").value = JSON.stringify(colors);
        document.getElementById("ownerfrm").value = JSON.stringify(owners);
        document.getElementById("birthsfrm").value = JSON.stringify(births);
        document.getElementById("deathsfrm").value = JSON.stringify(deaths);
        document.getElementById("descendantsfrm").value = JSON.stringify(descendants);
        document.getElementById("pairsfrm").value = JSON.stringify(pairs);
        document.getElementById("additionalfrm").value = JSON.stringify(additional);         
                    
            
                    
        $index = $index +1; 
        $('#txtidband').val(null);
        $('#txtname').val(null);
        $('#cbsex').val(null);
        $('#txtcolor').val(null);
        $('#txtowner').val(null);
        $('#dpbirth').val(null);
        $('#dpdeath').val(null);
        $('#cbdescendant').val(null);
        $('#paired-to').val(null);
        $('#txtadditional').val(null);
        
        $('#cbdescendant').selectpicker('refresh');
        $('#paired-to').selectpicker('refresh');
        alert("Pigeon was added successfully");
        }catch(err){}
    }else{
        alert("ID Band, Name, Sex, Color, Owner and Birthday are mandatory!");
    }
        
    });
    </script>
    <script type="text/javascript">
    $(document).on('ready', function() {
            $("#upload-xml").fileinput({
            showUpload:false,
            showPreview: false,
            allowedFileExtensions: ["xml"],
            elErrorContainer: "#errorBlock"
        });
    });
    </script>
</body>
</html>
