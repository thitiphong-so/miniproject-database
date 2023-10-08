<?php 
    session_start();

    // if (!isset($_SESSION['username'])) {
    //     $_SESSION['msg'] = "You must log in first";
    //     header('location: login.php');
    // }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>วันสงกรานต์</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="homecontent">
        <nav>
            <div class="container">
                <div class="navbar">
                    <div class="navbar-logo">
                        <a href="index.php">ECP3N</a>
                    </div>
                    <ul class="menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="blog.php">Blog</a></li>

                        <?php
                            if (isset($_SESSION['username'])) {
                                // User is logged in
                                // echo '<li><a href="profile.php">Profile</a></li>';
                                // echo '<li><a href="logout.php">Logout</a></li>';
                            } else {
                                // User is not logged in
                                echo '<li><a href="login.php"><ion-icon name="person-outline"></ion-icon>Login</a></li>';
                                // echo '<li><a href="register.php">Register</a></li>';
                            }
                        ?>

                        <?php if (isset($_SESSION['success'])) : ?>
                        <div class="success">
                            <h3>
                                <?php 
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                ?>
                            </h3>
                        </div>
                        <?php endif ?>
                        <!-- logged in  user imformation -->
                        <?php if (isset($_SESSION['username'])) : ?>
                            <p><strong><?php echo $_SESSION['username']; ?></strong><a href="index.php?logout='1'" style="color: red; text-decoration: none; margin-left: 1rem;">Logout</a></p>
                            <!-- <p><a href="index.php?logout='1'" style="color: red; text-decoration: none;">Logout</a></p> -->
                        <?php endif ?>

                    </ul> 

                </div>
            </div>
        </nav>
    </div>
    
    <div class="content">
        <section>
            <!-- Slideshow container -->
            <div class="slideshow-container">
                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <!-- <div class="numbertext">1 / 5</div> -->
                    <img src="image/img1.jpg" style="width:100%">
                    <!-- <div class="text">Caption Text</div> -->
                </div>
        
                <div class="mySlides fade">
                    <!-- <div class="numbertext">2 / 5</div> -->
                    <img src="image/img2.jpg" style="width:100%">
                    <!-- <div class="text">Caption Two</div> -->
                </div>
        
                <div class="mySlides fade">
                    <!-- <div class="numbertext">3 / 5</div> -->
                    <img src="image/img3.jpg" style="width:100%">
                    <!-- <div class="text">Caption Three</div> -->
                </div>
                <div class="mySlides fade">
                    <!-- <div class="numbertext">4 / 5</div> -->
                    <img src="image/img4.jpg" style="width:100%">
                    <!-- <div class="text">Caption Three</div> -->
                </div>
            </div>
            <!-- <div class="dot-container">
                <span class="dot" onclick="plusSlides(1)"></span>
                <span class="dot" onclick="plusSlides(2)"></span>
                <span class="dot" onclick="plusSlides(3)"></span>
                <span class="dot" onclick="plusSlides(4)"></span>
                <span class="dot" onclick="plusSlides(5)"></span>
            </div> -->
            <!-- The dots/circles -->
        </section>
        <section>
            <!-- content text -->
            <div class="cnt-box">
                <div class="cnt-1">
                    <h1>วันสงกรานต์</h1>
                </div>
                <div class="tm">
                    <ion-icon name="time-outline" style="margin: 0 5px -3px 0"></ion-icon>
                    <time datetime="2023-10-08">8 ตุลาคม 66</time>  
                </div>
                <hr>
                <div class="cnt-2">
                    <center>
                        <img src="image/songkran1.jpg">        
                    </center>
                    <br>
                    <h3>ประวัติความเป็นมา และความสำคัญของวันสงกรานต์</h3>
                    <p><strong style="color:#333;">วันสงกรานต์ </strong>หรือ วันมหาสงกรานต์ เป็นวันที่ได้รับอิทธิพลมาจากเทศกาลโฮลีของประเทศอินเดีย แต่วันสงกรานต์ของไทยเปลี่ยนจากการสาดสี เป็นการสาดน้ำใส่กัน เพื่อให้สอดคล้องกับสภาพอากาศที่ร้อนจัดในช่วงเดือนเมษายน และในอีกแง่หนึ่งยังมีความเชื่อว่าเป็นการปัดเป่าสิ่งไม่ดีออกไป ทำให้นิยมเล่นสาดน้ำ และประแป้งกันในช่วงเทศกาลสงกรานต์ โดยจะไม่ถือโทษโกรธกัน</p>
                    <p>คำว่า "สงกรานต์" มาจากภาษาสันสกฤต ที่มีความหมายว่า "การเคลื่อนย้าย" โดยเชื่อว่าในวันสงกรานต์ เป็นช่วงเวลาการเคลื่อนย้ายของจักรราศี อีกนัยหนึ่งก็คือการเคลื่อนสู่ปีใหม่ ทำให้คนไทยยึดถือวันสงกรานต์เป็น "วันขึ้นปีใหม่ไทย" มาตั้งแต่สมัยโบราณ จนกระทั่ง พ.ศ. 2483 ก่อนจะปรับเปลี่ยนให้เป็นไปตามแบบแผนสากลนิยม ซึ่งก็คือวันที่ 1 มกราคมของทุกปี</p>
                    <p>ทั้งนี้ การละเล่นสงกรานต์ไม่ได้มีแค่ในประเทศไทยเท่านั้น แต่ยังมีในประเทศเพื่อนบ้าน เช่น พม่า กัมพูชา ลาว รวมถึงบางพื้นที่ของเวียดนาม จีน ศรีลังกา และอินเดีย</p>
                    <h3>เรื่องเล่า "ตำนานนางสงกรานต์"</h3>
                    <p>สำหรับ<strong style="color:#333;">ประวัติวันสงกรานต์</strong> หรือกำเนิดวันสงกรานต์ มักมีเรื่องเล่าที่เชื่อมโยงถึง <strong style="color:#333;">"ตำนานนางสงกรานต์"</strong> โดยอ้างอิงตามจารึกที่วัดพระเชตุพนวิมลมังคลารามฯ ตำนานเล่าว่า มีเศรษฐีฐานะร่ำรวยคนหนึ่ง ไม่มีบุตร จึงไปบวงสรวงขอบุตรกับพระอาทิตย์ และพระจันทร์ แต่รอหลายปีก็ไม่มีบุตรสักที จนกระทั่งถึงฤดูร้อนปีหนึ่ง เศรษฐีได้นำข้าวสารซาวน้ำ 7 สี หุงบูชารุกขพระไทร พร้อมเครื่องถวาย และการประโคมดนตรี โดยได้ตั้งจิตอธิษฐานขอบุตร พระไทรได้ฟังก็เห็นใจ จึงไปขอบุตรกับพระอินทร์ให้เศรษฐี ต่อมาเศรษฐีได้บุตรชาย และตั้งชื่อว่า <strong style="color:#333;">"ธรรมบาลกุมาร"</strong> ธรรมบาลกุมารเป็นคนฉลาดหลักแหลม จนมีชื่อเสียงร่ำลือไปไกล ทำให้ท้าวกบิลพรหม ได้ลงมาท้าทายปัญญา โดยได้ถามปัญหากับธรรมบาลกุมาร ให้เวลา 7 วัน หากฝ่ายใดแพ้จะต้องตัดศีรษะบูชา ท้ายที่สุดธรรมบาลกุมารสามารถตอบปัญหาได้ ท้าวกบิลพรหมจึงต้องเป็นฝ่ายตัดศีรษะ แต่หากศีรษะนี้ตกลงพื้นโลก จะเกิดเพลิงไหม้โลก 
ท้าวกบิลพรหมจึงสั่งให้บาทบาจาริกาของพระอินทร์ทั้ง 7 นาง สลับหน้าที่หมุนเวียนทำหน้าที่อัญเชิญพระเศียร หรือศีรษะของตนแห่รอบเขาพระสุเมรุ ปีละ 1 ครั้ง ซึ่งตรงกับช่วงมหาสงกรานต์ โดย<strong style="color:#333;">นางสงกรานต์ทั้ง 7</strong> มีชื่อ ดังนี้</p>
                    <p>- วันอาทิตย์ นางสงกรานต์นาม <strong style="color:#333;">“ทุงษะเทวี”</strong> ทรงพาหุรัดทัดดอกทับทิม อาภรณ์แก้วปัทมราช ภักษาหารอุทุมพร (ผลมะเดื่อ) พระหัตถ์ขวาทรงจักร พระหัตถ์ซ้ายทรงสังข์ เสด็จมาบนหลังครุฑ แต่ทางล้านนาจะมีความเชื่อว่าวันอาทิตย์ ชื่อ นางแพงศรี</p>
                    <p>- วันจันทร์ นางสงกรานต์นาม <strong style="color:#333;">“โคราคะเทวี”</strong> ทรงพาหุรัดทัดดอกปีบ อาภรณ์แก้วมุกดา ภักษาหารเตลัง (น้ำมัน) พระหัตถ์ขวาทรงขรรค์ พระหัตถ์ซ้ายทรงไม้เท้า เสด็จมาบนหลังพยัคฆ์ (เสือ) แต่ทางล้านนาจะมีความเชื่อว่าวันจันทร์ ชื่อ นางมโนรา</p>
                    <p>- วันอังคาร นางสงกรานต์นาม <strong style="color:#333;">“รากษสเทวี”</strong> ทรงพาหุรัดทัดดอกบัวหลวง อาภรณ์แก้วโมรา ภักษาหารโลหิต พระหัตถ์ขวาทรงตรีศูล พระหัตถ์ซ้ายทรงธนู เสด็จมาบนหลังวราหะ (หมู) แต่ทางล้านนาจะมีความเชื่อว่าวันอังคาร ชื่อ นางรากษสเทวี</p>
                    <p>- วันพุธ นางสงกรานต์นาม <strong style="color:#333;">“มณฑาเทวี”</strong> ทรงพาหุรัดทัดดอกจำปา อาภรณ์แก้วไพฑูรย์ ภักษาหารนมเนย พระหัตถ์ขวาทรงเข็ม พระหัตถ์ซ้ายทรงไม้เท้า เสด็จมาบนหลังคัทรภะ (ลา) แต่ทางล้านนาจะมีความเชื่อว่าวันพุธ ชื่อ นางมันทะ</p>
                    <p>- วันพฤหัสบดี นางสงกรานต์นาม <strong style="color:#333;">“กิริณีเทวี”</strong> ทรงพาหุรัดทัดดอกมณฑา อาภรณ์แก้วมรกต ภักษาหารถั่วงา พระหัตถ์ขวาทรงขอช้าง พระหัตถ์ซ้ายทรงปืน เสด็จมาบนหลังคชสาร (ช้าง) แต่ทางล้านนาจะมีความเชื่อว่าวันพฤหัส ชื่อ นางัญญาเทพ </p>
                    <p>- วันศุกร์ นางสงกรานต์นาม <strong style="color:#333;">“กิมิทาเทวี”</strong> ทรงพาหุรัดทัดดอกจงกลนี อาภรณ์แก้วบุษราคัม ภักษาหารกล้วยน้ำ พระหัตถ์ขวาทรงขรรค์ พระหัตถ์ซ้ายทรงพิณ เสด็จมาบนหลังมหิงสา (ควาย) แต่ทางล้านนาจะมีความเชื่อว่าวันศุกร์ ชื่อ นางริญโท</p>
                    <p>- วันเสาร์ นางสงกรานต์นาม <strong style="color:#333;">“มโหธรเทวี”</strong> ทรงพาหุรัดทัดดอกสามหาว อาภรณ์แก้วนิลรัตน์ ภักษาหารเนื้อทรายพระหัตถ์ขวาทรงจักร พระหัตถ์ซ้ายทรงตรีศูล เสด็จมาบนหลังมยุรา (นกยูง) แต่ทางล้านนาจะมีความเชื่อว่าวันเสาร์ ชื่อ นางสามาเทวี</p>
                    <center>
                        <img src="image/songkran2.jpg">
                    </center>
                    <h3>กิจกรรมในวันสงกรานต์</h3>
                    <h4>การทำบุญตักบาตร</h4>
                    <p>ถือว่าเป็นการสร้างบุญสร้างกุศลให้ตัวเอง และ อุทิศส่วนกุศลนั้นแก่ผู้ล่วงลับไปแล้ว การทำบุญแบบนี้มักจะเตรียมไว้ล่วงหน้า นำอาหารไปตักบาตรถวายพระภิกษุที่ศาลาวัด ซึ่งจัดเป็นที่รวมสำหรับทำบุญ ในวันนี้หลังจากที่ได้ทำบุญเสร็จแล้ว ก็จะมีการก่อพระทรายอันเป็นประเพณีด้วย</p>
                    <h4>การรดน้ำ</h4>
                    <p>เป็นการอวยพรปีใหม่ให้กันและกัน น้ำที่รดมักใช้น้ำหอมเจือด้วยน้ำธรรมดา</p>
                    <h4>การสรงน้ำพระ</h4>
                    <p>รดน้ำพระพุทธรูปที่บ้านและที่วัดและบางที่จัดสรงน้ำพระสงฆ์ด้วย</p>
                    <h4>การรดน้ำผู้ใหญ่</h4>
                    <p>คือการไปอวยพรให้ผู้ใหญ่ที่เคารพนับถือ ครูบาอาจารย์ ท่านผู้ใหญ่มักจะนั่งลงแล้วผู้ที่รดก็จะเอาน้ำหอมเจือกับน้ำรดที่มือท่าน ท่านจะให้ศีลให้พรผู้ที่ไปรด ถ้าเป็นพระก็จะนำผ้าสบงไปถวายให้ท่านผลัดเปลี่ยนด้วย หากเป็นฆราวาสก็จะหาผ้าถุง ผ้าขาวม้าไปให้</p>
                    <h4>การดำหัว</h4>
                    <p>ก็คือการรดน้ำนั่นเอง แต่เป็นคำเมืองทางภาคเหนือ การดำหัวเรียกกันเฉพาะการรดน้ำผู้ใหญ่ที่เราเคารพนับถือ ผู้สูงอายุ คือการขอขมาในสิ่งที่ได้ล่วงเกินไปแล้ว หรือ การขอพรปีใหม่จากผู้ใหญ่ ของที่ใช้ในการดำหัวส่วนมากมีผ้าขนหนู มะพร้าว กล้วย และ ส้มป่อย</p>
                    <h4>การปล่อยนกปล่อยปลา</h4>
                    <p>ถือเป็นการล้างบาปที่ทำไว้ เป็นการสะเดาะเคราะห์ร้ายให้มีแต่ความสุขความสบายในวันขึ้นปีใหม่</p>
                    <h4>การนำทรายเข้าวัด</h4>
                    <p>ทางภาคเหนือนิยมขนทรายเข้าวัดเพื่อเป็นนิมิตโชคลาภ ให้มีความสุขความเจริญ เงินทองไหลมาเทมาดุจทรายที่ขนเข้าวัด</p>
                    <hr>
                    <p>ที่มา: กรมประชาสัมพันธ์, sanook</p>
                </div>
            </div>
            
        </section>
    
        <!----- FOOTER SECTION--- -->
        <footer>
            <div class="wrapper">
                <div class="last-footer">
                    <div class="last-footer-box">
                        <div class="mini-last-footer-box">
                            <a href="" class="logo">ECP3N</a>
                            <div class="last-box-content">
                                <h4>ABOUT US</h4>
                                <p style="color: rgb(150, 148, 148);">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                            </div>
                        </div>
                        <div class="icon-footer">
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    
        <div class="end">
            <div class="wrapper">
                <p>Design by - Dew Chatchawan Ngerthaworn</p>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script src="slides.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/88dfe94bff.js" crossorigin="anonymous"></script>

</body>
</html>