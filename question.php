<?php
  include "config.php";
  include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Question</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="question-Instruction">
    <h1 class="question-Instruction-Heading">
      <b>INSTRUCTION</b>
    </h1>
    <p class="question-Instruction-Details">
      Please choose your appropriate semester and subject,only then post your question.
    </p>
  </div>
  <main>
    <div class="left-Bar">

    </div>

    <div class="question-InputBox">
      <header class="sem-Select">
        
        <form action="">
          <div class="form-group">
            <select name="semester" class="form-control" onchange="fetchSubject(this.value)" id="semester">
            <?php
              $query = 'SELECT DISTINCT semNo FROM sem_sub ORDER BY semNo';
              $result = mysqli_query($conn,$query);
              if(!isset($row['semNo'])){
                echo '<option>Select Semester</option>';
              }
                          
                while($row = mysqli_fetch_assoc($result)){
                  foreach($row as $value){
                    echo '<option value = "' .$row['semNo'] . '">';
                    echo $row['semNo'] . '</option>';
                  }
                }
            ?>
            </select>
          </div>
          <div class="form-group">
            <select name="subject" class="form-control" onchange="fetchSubCode(this.value)" id="subject">
              <?php echo '<option value ="">Select Subject</option>'?>;
            </select>
          </div>
        </form>
      </header>
    </div>
  </main>

  <script src="question.js"></script>
</body>
</html>