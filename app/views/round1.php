<?php 
  $this->load->view('include/header');
?>
<div class="container">
  <!--Table for Slot1 -->
  <section id="Round1Table">
    <div class="page-header">
      <h3>Round 1</h3>
    </div>
    <div class="row">
      <div class="span16">
<?php 
  if($round_done)
  {
?>
<div class="alert-message warning">
    <p align="center"><strong> Your Round 1 choices have been recorded. You will not be able to make any more changes.</strong></p>
</div>
<?php 
  }
  else
  {
?>
      <form action="round1/submit" method="post">
        <table class="bordered-table zebra-striped" id="1Table"> 
          <thead>
            <tr>
              <th>SR NO.</th>
              <th>COURSE</th>
              <th>FACULTY</th>
              <th>SEATS</th>
              <th>SELECT</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = $this->db->get('courses');
            foreach($query->result() as $row)
            {
              echo "<tr> \n";
              echo "<td>". $row->course_id."</td> \n";
              echo "<td>". $row->course_name."</td> \n";
              echo "<td>". $row->faculty."</td> \n";
              echo "<td>". $row->seats."</td> \n";
              echo "<td><input type=\"checkbox\" name=\"". $row->course_id."\"</td> \n";
              echo "</tr> \n";
            }
            ?>
          </tbody>
        </table>
        <div class="actions span16">
          <input type="submit" class="btn primary" value="Submit"/>
        </div>
      </form>
<?php } ?>
      </div>
    </div>
  </section>
</div>
<?php 
  $this->load->view('include/footer');
?>
