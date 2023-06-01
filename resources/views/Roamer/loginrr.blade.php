<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Gapconcepts" />
    <meta name="copyright" content="" />

    <link href="vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- compulsory global.css -->
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="assets/sass/utility/typography.css">
    <link rel="stylesheet" href="assets/css/media.css">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- icons -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/css/bootstrap/icons/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="login-register-body">
    <div class="login-register-topbar">
        <div class="container">
            <ul>
                <li><a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="10" viewBox="0 0 19 10">
                            <path d="M0.217693 5.96061C0.217916 5.96083 0.218102 5.96109 0.218361 5.96131L4.09644 9.78583C4.38697 10.0723 4.85688 10.0713 5.14608 9.78333C5.43523 9.49542 5.43412 9.02975 5.14359 8.74321L2.53985 6.17548H18.2578C18.6677 6.17548 19 5.84621 19 5.44C19 5.03379 18.6677 4.70452 18.2578 4.70452H2.53988L5.14355 2.13679C5.43408 1.85025 5.43519 1.38458 5.14604 1.09667C4.85684 0.808693 4.38689 0.807701 4.0964 1.09417L0.218325 4.91869C0.218102 4.91891 0.217915 4.91917 0.217655 4.91939C-0.0730228 5.20689 -0.072094 5.67407 0.217693 5.96061Z" fill="white" />
                        </svg> Back To Home</a></li>
            </ul>
        </div>
    </div>
    <div class="login-register-outer">
        <div class="login-register-inner">
            <a href="index.php"><img src="assets/images/logo-dark.png" alt=""></a>
            <div class="form-area">
                <div class="card">
                    <div class="card-body">
                        <h4 class=" card-title text-center">Sign in</h4>
                        <br>
                        <br>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class=" form-control" placeholder="Enter email or phone number">
                            </div>
                            <div class="form-group">
                                <div class=" position-relative">
                                    <input id="password-field" type="password" name="password" class="form-control" placeholder="Enter your Password" required>
                                    <i class="toggle-password bi bi-eye position-absolute top-50 translate-middle-y font-20px opacity-06" style="right: 10px; cursor:pointer " toggle="#password-field"></i>
                                </div>
                            </div>
                            <div class="text-end">
                                <ul>
                                    <li><a href="javascript:void(0)" class=" black-anchor opacity-07 font-weight-400 hover-opacity-09">Recovery Password</a></li>
                                </ul>
                            </div>
                            <br>
                            <br>
                            <!-- <button class="btn btn-primary d-block w-100 text-uppercase font-weight-600 py-3" type="submit">Sign In</button> -->
                            <div class="text-center">
                                <a href="index.php" class="btn btn-primary d-block w-100 text-uppercase font-weight-600 py-3">Sign In</a>
                            </div>
                            <br>
                            <br>
                            <ul class=" text-center">
                                <li><span class=" opacity-07 font-weight-400">Want a job? </span><a href="signup.php" class=" primary-anchor text-uppercase">bECOME a Roamer</a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <ul class="d-flex align-items-center justify-content-center gap-4">
                <li><a href="help-center.php">Help Center </a></li>
                <li><a href="roamer-support.php">Roamer Support </a></li>
            </ul>
        </div>
    </div>

    <!-- bootstrap js file -->
    <script src="vendor/js/jquery-3.6.0.min.js"></script>
    <!-- <script src="vendor/js/bootstrap/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="vendor/js/bootstrap/bootstrap.min.js"></script>
    <!-- <script src="assets/js/main.js "></script> -->


    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("bi-eye bi-eye-slash-fill");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        // ################### start select option #################

        var x, i, j, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        for (i = 0; i < x.length; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            /*for each element, create a new DIV that will act as the selected item:*/
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /*for each element, create a new DIV that will contain the option list:*/
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 1; j < selElmnt.length; j++) {
                /*for each option in the original select element,
                      create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function(e) {
                    /*when an item is clicked, update the original select box,
                            and the selected item:*/
                    var y, i, k, s, h;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < s.length; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            for (k = 0; k < y.length; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                /*when the select box is clicked, close any other select boxes,
                      and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
            /*a function that will close all select boxes in the document,
                except the current select box:*/
            var x,
                y,
                i,
                arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            for (i = 0; i < y.length; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i);
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < x.length; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }

        document.addEventListener("click", closeAllSelect);

        // ################### end select option #################
    </script>
</body>

</html>
