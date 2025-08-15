<?php
include 'db.php'; // DB connection

// Fetch all services
$services_result = $conn->query("SELECT * FROM services ORDER BY id DESC"); 
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Personal Portfolio Website-Easy Tutorial</title> 
    <link rel="stylesheet" href="style.css"> 
    <script src="https://kit.fontawesome.com/f278347d6c.js" crossorigin="anonymous"></script>
</head> 
<body>
<div id="header">
    <div class="container">
        <nav>
            <img src="images/logo.jpeg" class ="logo"> 
            <ul id="sidemenu">
                <li><a href="#header">Home</a></li> 
                <li><a href="#about">About</a></li> 
                <li><a href="#services">Services</a></li> 
                <li><a href="#portfolio">Portfolio</a></li> 
                <li><a href="#contact">Contact</a></li> 
                <i class="fa-solid fa-circle-xmark" onclick="closemenu()"></i>
            </ul> 
            <i class="fa-solid fa-bars" onclick="openmenu()"></i>
        </nav> 
        <div class="header-text">
            <p>UI/UX Designer</p> 
            <h1>Hi, I'm<span> Tanha</span><br> Sayed Ahona From Bangladesh</h1>
        </div>
    </div>
</div> 

<!--------------about---------------->
<div id="about">
    <div class="container">
        <div class="row">
            <div class="about-col-1"> 
                <img src="images/user1.jpeg" alt="Tanha's photo">
            </div> 
            <div class="about-col-2">
                <h1 class="sub-title">About Me</h1> 
                <p> I currently studying Khulna University of Engineering and Technology. Now I am in third year. I am in Computer Science and Engineering department.  
                </p> 
                <div class="tab-titles">
                    <p class="tab-links active-link" onclick="opentab('skills')">Skills</p> 
                    <p class="tab-links" onclick="opentab('experience')">Experience</p> 
                    <p class="tab-links" onclick="opentab('education')">Education</p>
                </div> 
                
                <div class="tab-contents active-tab" id="skills">
                    <ul>
                        <li><span>UI/UX</span><br>Designing Web/App interface</li> 
                        <li><span>Web Development</span><br>Web App Development</li> 
                        <li><span>App Development</span><br>Building Android/iOS Apps</li> 
                        <li><span>Algorithm Analysis and Design</span><br>Solving problems efficiently using DSA concepts</li>
                    </ul>
                </div> 
                <div class="tab-contents" id="experience">
                    <ul>
                        <li><span>2025-Current</span><br>UI/UX Design Training at ET Institute</li> 
                        <li><span>2019-2024</span><br>Team lead at StartUp LLC.</li> 
                        <li><span>2017-2019</span><br>UI/UX Design Executive at Coin Digital LTD.</li> 
                        <li><span>2016-2017</span><br>Internship at ekart eCommerce</li>
                    </ul>
                </div>  
                <div class="tab-contents" id="education">
                    <ul> 
                        <li><span>2027</span><br>BSc in CSE from KUET</li>
                        <li><span>2021</span><br>HSC from Kushtia Govt. College</li> 
                        <li><span>2019</span><br>SSC from Kumarkhali Govt. Girls' School</li>
                        <li><span>2025</span><br>UI/UX Design Training at ET Institute</li> 
                    
                    </ul>
                </div> 
            </div>
        </div>
    </div>
</div>  

<!-----------services--------->
<div id="services">
    <div class="container">
        <h1 class="sub-title">My Works & Services</h1> 

        <!-- Add Service Form -->
        <form action="add_service.php" method="POST" style="margin-bottom: 40px;">
            <input type="text" name="title" placeholder="Service Title" required style="width: 100%; padding: 12px; margin-bottom: 10px; border-radius: 6px; border:none;">
            <textarea name="description" placeholder="Service Description" required style="width: 100%; padding: 12px; border-radius: 6px; border:none; margin-bottom: 10px;"></textarea>
            <button type="submit" class="btn btn2">Add Service</button>
        </form>

        <div class="services-list">
            <?php while ($service = $services_result->fetch_assoc()): ?>
                <div>  
                    <h2><?= htmlspecialchars($service['title']) ?></h2> 
                    <p><?= nl2br(htmlspecialchars($service['description'])) ?></p> 
                    <a href="update_service.php?id=<?= $service['id'] ?>">Edit</a> | 
                    <a href="delete_service.php?id=<?= $service['id'] ?>" onclick="return confirm('Are you sure you want to delete this service?')">Delete</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div> 

<!---------portfolio----------> 
<div id="portfolio">
    <div class="container">
        <h1 class="sub-title">My Works & Services</h1> 
        <div class="work-list">
            <div class="work">
                <img src="images/work-1.png" alt="Social Media App"> 
                <div class="layer">
                 <h3>Social Media App</h3> 
                 <p>The app connects use talented people around the world. Download it from playstore</p> 
                 <a href="#"> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div> 
            <div class="work">
                <img src="images/work-2.png" alt="Music App"> 
                <div class="layer">
                    <h3>Music App</h3> 
                    <p>The app connects use talented people around the world. Download it from playstore</p> 
                    <a href="#"> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div> 
            <div class="work">
                <img src="images/work-3.png" alt="Online Shopping App"> 
                <div class="layer">
                    <h3>Online shopping App</h3> 
                    <p>The app connects use talented people around the world. Download it from playstore</p> 
                    <a href="#"> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
        </div> 
        <a href="#" class="btn">See More</a>
    </div>
</div> 

<!--------contact---------> 
<div id="contact"> 
    <div class="container">
        <div class="row">
            <div class="contact-left">
                <h1 class="sub-title">Contact Me</h1> 
                <p><i class="fa-solid fa-paper-plane"></i> ahona9168@gmail.com</p> 
                <p><i class="fa-solid fa-phone"></i> 01305086577</p> 
                <div class="social-icons"> 
                    <a href="https://facebook.com"><i class="fa-brands fa-facebook"></i></a> 
                    <a href="#"><i class="fa-brands fa-twitter-square"></i></a> 
                    <a href="#"><i class="fa-brands fa-instagram"></i></a> 
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div> 
                <a href="images/my-cv.pdf" download class="btn btn2">Download CV</a> 
            </div> 
            <div class="contact-right"> 
                <form name="submit-to-google-sheet">
                    <input type="text" name="Name" placeholder="Your Name" required> 
                    <input type="email" name="Email" placeholder="Your Email" required> 
                    <textarea name="Message" rows="6" placeholder="Your Message"></textarea> 
                    <button type="submit" class="btn btn2">Submit</button>
                </form>
                <span id="msg"></span> 
            </div>
        </div>
    </div> 
    <div class="copyright">
        <p>Copyright Ahona. Made with <i class="fa-solid fa-heart"></i> by Easy Tutorials</p>
    </div>
</div>

<script>
var tablinks = document.getElementsByClassName("tab-links"); 
var tabcontents = document.getElementsByClassName("tab-contents"); 

function opentab(tabname) {
    for (tablink of tablinks) {
        tablink.classList.remove("active-link");
    } 
    for (tabcontent of tabcontents) {
        tabcontent.classList.remove("active-tab");
    } 
    event.currentTarget.classList.add("active-link"); 
    document.getElementById(tabname).classList.add("active-tab");
}

var sidemenu = document.getElementById("sidemenu"); 

function openmenu() {
    sidemenu.style.right = "0";
} 
function closemenu() {
    sidemenu.style.right = "-200px";
}

const scriptURL = 'https://script.google.com/macros/s/AKfycbzNHXLHy7c2WVBI7qtStkiKCnP_FwPZCgLxKoT5xTPRUvZHrlYNjyZHdCIt8_69-jr9/exec';
const form = document.forms['submit-to-google-sheet'];
const msg = document.getElementById("msg");
form.addEventListener('submit', e => {
    e.preventDefault();
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
    .then(response => {
        msg.innerHTML = "Message sent successfully";
        setTimeout(() => { msg.innerHTML = "" }, 5000);
        form.reset();
    })
    .catch(error => console.error('Error!', error.message));
});
</script>

</body>
</html>

