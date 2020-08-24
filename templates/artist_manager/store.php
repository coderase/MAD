<div id="artist_projects" class="content" <?php echo (!isset($_GET['create-project']) AND !isset($_GET['competes']) AND !isset($_GET['store']) AND !isset($_GET['create-product']) AND !isset($_GET['campaigns']) AND !isset($_GET['featured']))? '' : 'style="display: none;"'; ?>>
  <div class="artist_projects_button">
  <a href="<?php echo $artist_manager_url.'?create-product=1'; ?>">Create your product</a>
  </div>

  <div class="container">
    <div class="col1">
      <p class="title">View by</p>
      <input type="text" placeholder="search"/>
      <div class="filter">
        <ul>
          <li class="active">All</li>
          <li>Favorites</li>
          <li>MAD feeds</li>
        </ul>
      </div>

      <a class="profil_button">Settings</a>
    </div>

    <div class="col2">
      <p class="title">Why create your product on MAD?</p>

      <!--<div class="project_advantages">
        <div class="project_advantages_box">
          <p class="subtitle">Set your Budget</p>

          <p>We make it super easy to work with artists accross all social platforms at a budget that is right for you.</p>
          <p>Endorsement start at USD 100</p>
        </div>

        <div class="project_advantages_box">
          <p class="subtitle">Select Artists</p>

          <p>Reviews proposals, profiles, and audience demographics prior to hiring. We give you all the tools you need to drive views, likes, and engagement.</p>
          <p>The Earth's without "Art" is "Eh"</p>
        </div>

        <div class="project_advantages_box">
          <p class="subtitle">Grow customers</p>

          <p>From video product reviews to epic photos to engaging tweets. MAD allows Brands to get the content they need to drive views, likes, and engagement.</p>
        </div>
      </div>-->
    </div>
  </div>
</div>
