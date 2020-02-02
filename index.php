
<?php 
include 'header_nav.php';
require_once "alert_message.php";
?>

<section >
  <!-- image slider -->
  <div class='jumbotron my-1 p-0'style="background-color:#070707;">
    <div class='row'>
      <div class='col-sm-8 no-gutters'>
        <div class="card text-secondary text-justify">
          <div class='carousel slide' id='magic' data-ride='carousel'>
            <ol class="carousel-indicators">
              <li data-target="#magic" data-slide-to="0" class="active"></li>
              <li data-target="#magic" data-slide-to="1" ></li>
              <li data-target="#magic" data-slide-to="2" ></li>
            </ol>
            <div class='carousel-inner' role='listbox'>
              <div class='carousel-item active'>
                <img class="d-block w-100 img-fluid" src="image/1.jpg" style="object-fit: cover; width: 100%/9;">
                <div class="carousel-caption">
                  <h3>We started here</h3>
                </div>
              </div>
              <div class='carousel-item'>
                <img class="d-block w-100 img-fluid" src="image/2.jpg" style="object-fit: cover; width: 100%/9;">
                <div class="carousel-caption">
                  <h3>We started here</h3>
                </div>
              </div>
              <div class='carousel-item'>
                <img class="d-block w-100 img-fluid" src="image/3.jpg" style="object-fit: cover; width: 100%/9;">
                <div class="carousel-caption">
                  <h3>We started here</h3>
                </div>
              </div>
              <a class="carousel-control-prev" href="#magic" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="sr-only">Previous </span>
              </a>
              <a class="carousel-control-next" href="#magic" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- card for notice area recent -->
      <div class='col-sm-4'>
        <div class="card pr-2 text-secondary text-justify"style="height:493.875px;background-color:#070707;" >
          
          <div class="pt-2 text-white" style="border-bottom: 5px solid #ff4232;"><marquee behavior="alternate" direction="left"><h4>Recent Notices</h4></marquee></div>
          <?php 
          require "connection.php";
          $sql="SELECT titles, image, discription, created_at FROM notice ORDER BY id DESC LIMIT 3";
          $result = $connect->query($sql);
          $data = [];
          
          if ($result->num_rows > 0) { 
            while ($user = $result->fetch_assoc()) {
             array_push($data, $user);
           }
         }
         foreach ($data as $index=>$n){           
          ?>
          <div class="my-2">
            <div class="px-2 notice"style="border-left: 6px solid #ff4232;">
              <div class=''><a style="font-size:17px;"class="text-light text-justify btn text-justify" href="discription.php?ida=<?php echo $n['created_at']; ?>"><?php echo $n['titles']; echo "<br/>"; 
              $a= $n['created_at'];
              
              $newDate = date("M d, Y", strtotime($a));
              echo "<div class='small text-secondary'>$newDate</div>";
              ?></a></div>
            </div>
          </div>
        <?php } ?>

        <div class="card-footer">
          <a class="btn-sm  text-light" style="border:2px solid #ff4232;bottom: 20px; position:absolute; right: 20px;" href="notice.php">View All</a>
        </div>


      </div>

    </div>
  </div>
</div>
</section>

<!-- for content of home -->
<section>
  <div id="home" class="container-fluid mt-1" style="background-color: #070707;">  
    <div class="card-body">
      <h5 class="text-light" style="border-bottom: 2px solid #6a6a6a">Bachelor in Computer Application (B.C.A)</h5>
      <p class="p-color text-justify">
      Tribhuvan University has launched Bachelor of Computer Application (BCA) program from the academic year 2074/75.  In the first phase, this program has been launched in six (6) constituent campuses of Tribhuvan University, we are proud to be one of them and are allocated 35 seats each.Currently 125 Colleges are running BCA program with the affiliation from Tribhuvan University. The BCA program of TU is of 4 years. The program runs on semester-system. It will be run under the faculties of Humanities and Social Sciences.</p>
      <ul class="text-justify p-color">
        <h5 class="text-light" style="border-bottom: 2px dotted #ddd;">Objectives</h5>
        <li>To develop understanding of all aspects of existing and emerging information technologies and their impact on the Information system function</li>
        <li>To develop understanding of design and development of database applications using the latest technologies</li>
        <li>To develop understanding of the wider world : Society, Management, Economics, Mathematics, Statistics</li>
        <li>To develop understanding of Ethics and greater Social Responsibility</li>
        <li>To develop ability to think critically, communicate clearly and solve complex problems</li>
        <li>To develop ability to work in a team and lead innovation in the workplace</li>
      </ul>
      <h5 class="text-light " style="border-bottom: 2px dotted #ddd;">What you will study?</h5>
      <p class="p-color text-justify" >
      Core courses cover essential information technology topics such as networking, programming, artificial intelligence, cyber law, and software development and information systems. Studying these areas will give you a comprehensive understanding and provide you with the necessary acumen to move into almost any area of business and providing solutions with the knowledge of information technology.</p>

      <p class="p-color text-justify">In the final year, you can opt to specialize in either of the combinations which will be created from the pool of available electives which is spread into various areas that may interest you and match your career aims. There are also elements of personal development built into the program, which will help you learn about yourself and discover where your strengths lie. By graduation, you will be ready for a successful career.</p>

      <p class="p-color text-justify">Student will also participate in General Education Courses that will provide an opportunity to enhance your study skills and broaden your knowledge. These courses will allow you to develop a sense of social responsibility as well as strong intellectual and practical skills that cover all areas of study, such as communication, analytical and problem solving skills, with a demonstrated ability to apply these knowledge and skills in real-world settings.</p>

      <h5 class="text-light" style="border-bottom: 2px dotted #ddd;">Eligibility</h5>
      <p class="p-color text-justify">Students who have passed PCL or + 2 or equivalent examinations  with minimum 40% marks  or 2 CGPA (not less than D+ in single Subject) are eligible for admission in BCA program.</p>

      <h5 class="text-light" style="border-bottom: 2px dotted #ddd;">Job Prospects</h5>
      <p class="p-color text-justify">BCA graduates can apply for a post of system analysts, system managers, project managers, database administrators, system designers and programmers in IT Companies. Information industries and manufacture industries are always seeking for BCA graduates.</p>

      <p class="p-color text-justify">Students completing their Bachelor's degree in Computer Application are further eligible to study in any faculties which come under the Management and Information Technology such as MCA, MIT, MBA and many more. </p>          
    </div>
  </div>
</section>

<!-- for content of about us -->
<section>
  <div id="about" class="container-fluid mt-1" style="background-color: #070707;">  
    <div class="card-body">
      <h5 class="text-light" style="border-bottom: 2px solid #6a6a6a">Patan Multiple Campus</h5>
      <p class="p-color text-justify">
        Patan Multiple Campus is the only constituent campus of T.U in Lalitpur district, the second largest city in the valley. It was formally founded on 17th Bhadra, 2011 B.S, and it was then named as "Patan Inter College".  The college was inaugurated by the then crown prince His Majesty Mahendra Bir Bikram Shah on Bhadra 31, 2021 BS.
      </p>
      <p class="p-color text-justify">
        Several educationists had tirelessly worked for the establishment of the college in Lalitpur district. They include: Prof. Mangal Raj Joshi, Prof. Asharam Shakya, Mr. Kamal Mani Dixit, Prof. Hem Raj Joshi, Mr. Indra Raj Mishra, Mr. Pradhumna Lal Joshi, Mr. Bhairab Bahadur Pradhan, Mr. Raj Bahadur Chipalu, and Laxmi Prasad Rimal.            
      </p>
      <p class="p-color text-justify">
        After the implementation of national education system, the Patan Inter College was renamed as Patan Multiple Campus on Shravan 1, 2030 BS. Since then the campus has been functioning as a constituent campus of the T.U. In accordance with the 2055 Decentralization Act of the TU, the campus has entered into decentralization since 2056 BS. Twenty-five students, including a girl, were at the Patan Inter College at the time of its foundation. However, as a result of the educational awareness in the people of Lalitpur, and also because of the efforts of the campus administration, now the campus is successful in conducting Bachelor and Degree level programmes in the Morning, Day and Evening shifts in Humanities, Science and Management. At present, 306 teachers and 116 employees are directly involved as the human resources for the smooth functioning of different level programmes.
      </p>
    </div>
  </div>
</section>

<?php include 'footer.php';?>
