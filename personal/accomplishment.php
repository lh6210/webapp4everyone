<!DOCTYPE html>
<html lang="en">
  <head>  <!-- head meta data -->
    <?php require_once 'pdo.php'
    ?>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Math Vista</title>
    <!-- bootstrap CSS-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="stylesheets/style.css">
		<!-- icon -->
		<script src="https://kit.fontawesome.com/cbc558647c.js" crossorigin="anonymous"></script>
		<link rel="icon" href="assets/icons/feather-alt-solid.svg">
		<!-- MathJax -->
		<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
		<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
		<!-- MathJax ends -->
  </head>  <!-- head ends -->

  <body>
		<div class="container-fluid">
			<!-- header of the body -->
			<div class="row">  <!-- header -->
				<header class="col-12">
					<h1 class="text-center">Math and Plot</h1>
				</header>
			</div>  <!-- header ends -->

			<div class="row">
				<div class="col-12">  <!-- sidebar -->
					<h2>Courses I have completed:</h2>
					<p><?php
          $sql = 'select courses.name as c1, category.name c2, courses.certificate c3, date_format(courses.start_date, "%M-%Y") c4, date_format(courses.end_date, "%M-%Y") c5 from Courses join category where courses.category_id =category.id and courses.status_id = 1';
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
          echo "<table id='tbl_completed'>";
          echo "<thead>";
          echo "<tr><th>Course Name</th><th>Category</th><th>Certificate</th><th>Start Date</th><th>End Date</th></tr></thead>";
          echo "<tbody>";
          foreach($rows as $row) {
              echo "<tr><td class='tbl1'>";
              echo "{$row['c1']}</td><td class='tbl1'>{$row['c2']}</td><td class='tbl1'><a href={$row['c3']} target='_blank'>Link</a></td><td class='tbl1'>{$row['c4']}</td><td class='tbl1'>{$row['c5']}</td>";
              echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";
          /*
          $course_desc_sql = "select website from courses where name = ?";
          $course_desc_obj = $pdo->prepare($course_desc_sql);
          $course_desc_obj->execute(array($row['c1']));
          $website = $course_desc_obj->fetch();
          echo "<form method='post'>";
          echo "<input type='hidden' name='h_link' value=$website[0]>";
          echo "<input type='submit' value='Course Description?' name='submit'>";
          if (isset($_POST['submit']) && isset($_POST['h_link'])) {
            echo "<a href=$website[0] target='_blank'>Course Link</a>";
          }
          */
          ?></p>
				</div>
			</div>

			<div class="row">
				<div class='col-12'>
					<p><h2>Course I am taking:</h2>
					<p><?php
          $sql = 'select courses.name as c1, category.name c2, date_format(courses.start_date, "%M-%Y") c3 from Courses join category where courses.category_id =category.id and courses.status_id = 2';
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
          echo "<table>";
          echo "<thead><tr><th>Course Name</th><th>Category</th><th>Start Date</th></tr></thead>";
          echo "<tbody>";
          foreach($rows as $row) {
              echo "<tr><td>";
              echo "{$row['c1']}</td><td>{$row['c2']}</td><td>{$row['c3']}</td>";
              echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";
          ?></p>
					<a href="https://www.wa4e.com/">Web Application for Everybody</a></h2>
				</div>
			</div>




					<a href="#cal1">Back to Top</a>
				</div> <!-- main ends -->
			</div>  <!-- row ends -->

			<!--footer row begins-->
			<div class="row">
				<footer class="col-12 d-flex justify-content-around">
					<p>Copyright &copy; 2020 Math and Plot</p>
					<p>Email: xxx@xxx.com</p>
				</footer>
		  </div>
		</div> <!-- container ends -->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
