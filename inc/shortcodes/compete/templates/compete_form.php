<form action="#" method="POST" enctype="multipart/form-data" id="compete_form">
  <p class="title">I want to participate</p>

  <div class="form_content">
    <div class="half_row">
      <input type="text" name="first_name" id="first_name" placeholder="*Prénom"/>
    </div>

    <div class="half_row">
      <input type="text" name="last_name" id="last_name" placeholder="*Nom"/>
    </div>

    <div class="half_row">
      <input type="text" name="artist_name" id="artist_name" placeholder="Nom d'artiste"/>
    </div>

    <div class="half_row">
      <input type="text" name="town" id="town" placeholder="*Ville en France"/>
    </div>

    <div class="half_row">
      <input type="text" name="birthday" id="birthday" placeholder="Date de naissance (dd/mm/aaaa)"/>
    </div>

    <div class="half_row">
      <input type="email" name="email" id="email" placeholder="*Email"/>
    </div>


    <div class="full_row">
      <textarea placeholder="Présentez vous (400 mots max)"></textarea>
    </div>

    <div class="half_row">
      fichier
    </div>

    <div class="full_row">
      <input type="text" name="video_link" id="video_link" placeholder="On adore les vidéos, si c'est aussi votre cas, envoyez-nous votre lien"/>
    </div>

    <div class="full_row">
      <textarea placeholder="*Que souhaitez-vous présenter/exposer à <?php //echo get_the_title($post->ID); ?>"></textarea>
    </div>

    <div class="half_row">
      fichier
    </div>

    <div class="half_plus_row">
      <select>
        <option value="null">Comment avez-vous connu le concours ?</option>
      </select>
    </div>

    <p class="infos">Si vous avez des problèmes pour soumettre votre candidatures,</p>
    <p class="infos">contactez help@howmadareyou.com</p>
  </div>

  <a class="button">Submit your entry here</a>
</form>
