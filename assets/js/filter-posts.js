$(document).ready(function() {
  $.ajax({
    url: ajax_object.ajax_url,
    type: 'POST',
    data: {
      action: 'filter_posts',
      years: [],
      months: [],
      places: []
    },
    success: function(data) {
      $('#posts-container').html(data);
    }
  });
});

jQuery(document).ready(function($) {
  $('#filter-form').on('change', function(e) {
    e.preventDefault();

    var selectedYears = [];
    var selectedMonths = [];
    var selectedPlaces = [];

    $('input[name="year"]:checked').each(function() {
      var placeValue = $(this).val();
      selectedYears.push(placeValue);
    });

    $('input[name="month"]:checked').each(function() {
      var placeValue = $(this).val();
      selectedMonths.push(placeValue);
    });

    var selectedPlace = $('#place-select').val();
    if (selectedPlace) {
      selectedPlaces.push(selectedPlace);
    }

    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'filter_posts',
        years: selectedYears,
        months: selectedMonths,
        places: selectedPlaces
      },
      success: function(data) {
        $('#posts-container').html(data);
      }
    });
  });
});
