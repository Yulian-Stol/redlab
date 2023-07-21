<?php
/* Template name: Головна */
?>

<?php get_header(); ?>


<form id="filter-form">
  <h3>Filter by Taxonomy:</h3>
  <fieldset>
    <legend>Year:</legend>
    <?php
    $years = get_terms( array(
      'taxonomy' => 'year',
      'hide_empty' => false,
    ) );

    foreach ($years as $year) {
      echo '<label><input type="checkbox" name="year" value="' . esc_attr($year->slug) . '"> ' . esc_html($year->name) . '</label><br>';
    }
    ?>
  </fieldset>

  <fieldset>
    <legend>Month:</legend>
    <?php
    $months = get_terms( array(
      'taxonomy' => 'month',
      'hide_empty' => false,
    ) );

    foreach ($months as $month) {
      echo '<label><input type="checkbox" name="month" value="' . esc_attr($month->slug) . '"> ' . esc_html($month->name) . '</label><br>';
    }
    ?>
  </fieldset>


  <fieldset>
    <legend>Place:</legend>
    <select id="place-select" name="place">
      <option value="">Оберіть місце</option>
      <?php

      $places = get_terms( array(
        'taxonomy' => 'place',
        'hide_empty' => false,
      ) );

      foreach ($places as $place) {
        echo '<option value="' . esc_attr($place->slug) . '">' . esc_html($place->name) . '</option>';
      }
      ?>
    </select>
  </fieldset>
</form>

<div id="posts-container">
  <!-- The filtered posts will be displayed here -->
</div>




<?php get_footer(); ?>