<?php 
  $data['isRound3'] = true;
  $this->load->view('include/header', $data);
?>


<div class="container">
<?php 
  if($round_done)
  {
?>
<div class="alert-message warning">
    <p align="center"><strong> Your Round 2 choices have been recorded. You will not be able to make any more changes.</strong></p>
</div>
<?php 
  }
  else
  {
?>
<form action="round2/submit" method="post">
<?php
  $get_slots_query = " SELECT COUNT( DISTINCT slot ) as count FROM  `round2_slots` WHERE 1 ";
  $query = $this->db->query($get_slots_query); 
  $num_slots=0;
  foreach($query->result() as $row)
  {
     $num_slots = $row->count;
  }
?>
  <div class="pagination">
    <ul>
<?php 
  for($i=1; $i<= $num_slots; $i++)
  {
    echo "<li><a href=\"#slot$i\">$i</a></li>";
  }
?>
     </ul>
  </div>

<?php
  for($i=1; $i<= $num_slots; $i++)
  {
    echo "<section id=\"slot$i\">";
?>
<div class="page-header">
<h3>Slot <?php echo $i;?></h3>
</div>
<div class="row">
  <div class="span12">
    <table class="bordered-table zebra-striped">
      <thead>
        <tr>
          <th>COURSE ID</th>
          <th>COURSE</th>
          <th>FACULTY</th>
          <th>SEATS</th>
          <th>APPLIED</th>
        </tr>
      </thead>
      <tbody>
<?php
    $query = $this->db->get_where('round2_display_view',array('slot'=>$i));
    
    foreach($query->result() as $row)
    {
      $slot_courses[$row->course_id] = $row->course_name;
      echo "<tr> \n";
      echo "<td>". $row->course_id."</td> \n";
      echo "<td>". $row->course_name."</td> \n";
      echo "<td>". $row->faculty."</td> \n";
      echo "<td>". $row->seats."</td> \n";
      echo "<td>". $row->applied."</td> \n";
      echo "</tr> \n";
    }
?>
      </tbody>
    </table>
  </div>

  <div class="span4">
    <h5>Course Select</h5>
    <select name= "<?php echo "slot$i"?>">
      <option value="nil">--------</option>
<?php 
    foreach($slot_courses as $course_id=>$course_name)
    {
      echo "<option value=\"$course_id\">$course_name</option> \n";
    }
    $slot_courses = "";
?>
    </select>
  </div>
</div>
</section>
<?php 
  } ?>

<div class="actions well">
  <input type="submit" class="btn primary" name="" value="Submit Courses" id=""/>
  <a href="#header">Top</a>
</div>
</form>
<?php
  }
?>

<?php 
  $this->load->view('include/footer');
?>
