<?php
function mad_project_date_html(){
  global $post; ?>

  <div id="mad_project_date_container">
    <div class="mad_project_date_box">
      <label for="start_date">Date de début</label>
      <input type="text" id="start_date" name="start_date" onchange="change_min_end_date();"/>
    </div>

    <div class="mad_project_date_box">
      <label for="end_date">Date de fin</label>
      <input type="text" id="end_date" name="end_date"/>
    </div>
  </div><?php
}

function mad_project_contribution_html(){
  echo 'Contribution(s)';
}

function mad_project_perks_html(){
  echo 'contre-parties';
}
