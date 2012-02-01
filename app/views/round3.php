<?php
$this->load->view('include/header');
?>

<div class="container">

<section id="bidTable">
  <div class="page-header">
    <h3>Round 3</h3>
  </div>
  <div class="row">
    <div class="span4">
      <input type="button" class="btn primary" value="Submit Bid"/>
      <div class="bidScore">
        <h5>Points left</h5>
        <h5 id="points"></h5>
      </div>
    </div>
    <div class="span12">
    <form action="round3/submit" method="post">
      <table class="bordered-table zebra-striped" id="1Table"> 
        <thead>
          <tr>
            <th>COURSE ID</th>
            <th>COURSE NAME</th>
            <th>FACULTY</th>
            <th>SEATS</th>
            <th>APPLIED</th>
            <th>BID VALUE</th>
          </tr>
        </thead>
        <tbody>
<?php 
  $query = $this->db->query(
    "select * from opentobid_view JOIN round2_users ".
    " on opentobid_view.course_id=round2_users.course_id" .
    " where user_id='".getUserName()."'");

  foreach($query->result() as $row)
  {
    echo "<tr> \n";
    echo "<td>". $row->course_id." </td>\n";
    echo "<td>". $row->course_name." </td>\n";
    echo "<td>". $row->faculty." </td>\n";
    echo "<td>". $row->seats." </td>\n";
    echo "<td>". $row->round2." </td>\n";
    echo "<td><input type=\"text\" class=\"small\"></td>\n";
    echo "</tr> \n";
  }

?>
        </tbody>
      </table>
    </div>
    </form>
  </div>
</section>

<?php
$this->load->view('include/footer');
?>


