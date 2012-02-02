<?php 
  $get_slots_query = " SELECT COUNT( DISTINCT slot ) as count FROM  `round2_slots` WHERE 1 ";
  $query = $this->db->query($get_slots_query); 
  $num_slots=0;
  foreach($query->result() as $row)
  {
     $num_slots = $row->count;
  }
  $data['round'] = 2;
  $data['num_slots'] = $num_slots;

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
<form action="round2/submit" method="post" id="round2Form">
<?php
  for($i=1; $i<= $num_slots; $i++)
  {
    echo "<section id=\"slot$i\">";
?>
<div class="page-header">
<h3>Slot <?php echo $i;?></h3>
</div>
<div class="row">
  <div class="span16">
    <table class="bordered-table zebra-striped round2Tables">
      <thead>
        <tr>
          <th>COURSE ID</th>
          <th>COURSE</th>
          <th>FACULTY</th>
          <th>SEATS</th>
          <th>APPLIED</th>
          <th>CREDITS</th>
          <th>SELECT</th>
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
      echo "<td>". $row->credits."</td> \n";
      echo "<td><input type=\"radio\" name=\"slot".$row->slot."Radio\" value=\"". $row->course_id."\"\></td> \n";
      echo "</tr> \n";
    }
?>
      </tbody>
    </table>
  </div>
</div>
</section>
<?php 
  } 
?>

<div id="modal-from-dom" class="modal hide fade">
  <div class="modal-header">
    <a href="#" class="close">&times;</a>
    <h3>Submission Confirmation</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure you want to submit your choices? Only one submission is allowed, hence your choices will be considered final.</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn primary">Yup! I'm sure</a>
    <a href="#" class="btn secondary quit">No, I'll check again</a>
  </div>
</div>

<div class="actions well">
  <input type="submit" id= "round2submit" class="btn primary" value="Submit Courses"/>
  <a href="#header">Top</a>
</div>
</form>
<?php
  }
?>

<?php 
  $this->load->view('include/footer');
?>
