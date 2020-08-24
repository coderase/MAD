<form action="#" method="POST" class="archives_search_container" id="artist_search_form">
  <div class="archives_search_input">
    <input type="text" placeholder="Type it till you find it">
    <a onclick="submit_search_form('#artist_search_form');"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/Zoom.png'; ?>"/></a>
  </div>

  <div class="archives_search_filter">
    <div class="custom_select">
      <a class="custom_select_toogle" onclick="toogle_selector('#project_type');">
        <p class="custom_select_default">Type of project</p>
        <img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/down.png'; ?> "/>
      </a>

      <div id="project_type" class="custom_select_items">
        <ul>
          <li onclick="">Music</li>
          <li onclick="">Art</li>
          <li onclick="">Design</li>
        </ul>
      </div>
    </div>

    <div class="custom_select">
      <a class="custom_select_toogle" onclick="toogle_selector('#project_location');">
        <p class="custom_select_default">Location</p>
        <img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/down.png'; ?> "/>
      </a>

      <div id="project_location" class="custom_select_items">
        <ul>
          <li onclick="">France</li>
          <li onclick="">Liban</li>
        </ul>
      </div>
    </div>
  </div>

  <input type="hidden" name="" id=""/>
  <input type="hidden" name="" id=""/>
</form>
