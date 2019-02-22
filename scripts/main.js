//filtering & search


var url_string = window.location.href; // gets query parameters from url
var url = new URL(url_string);
var searchQuery = url.searchParams.get("searchName"); // conditionals for data pull
if (searchQuery) {
	var searchName = searchQuery;
}
var sorter = url.searchParams.get("sortBy"); // conditionals for data pull
if (sorter) {
	var sortBy = sorter;
} else {
	var sortBy = 'name';
}



var pageNumber = 1;

// spinner code, displays while page loads
var myVar;

function loadThePage() {
	 $("#selectSort").val(sortBy);
	  $("#searchTitle").val(searchName);
  getResults(pageNumber, 20);
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
	$("#directory").addClass("show-directory");
	$("body").addClass("ovrflw-scroll");
}

function hideSpinner() {
	$("#spinner").fadeOut()
}



// get results
function getResults(pageNumber, cardNumber) {
	$("#spinner").fadeIn();
	var $directory = $("#directory");

	$.ajax({
		type: 'GET',
		url: 'https://api.magicthegathering.io/v1/cards/',
		data: { // variables for search, filtering, and pagination use
			types: 'Creature',
			name: searchName,
      contains: 'multiverseId',
			orderBy: sortBy,
			pageSize: cardNumber,
			page: pageNumber
		},
		success: function(cards) {
			$.each(cards, function(i, card) {
				var displayCards = []; // create array for cards to be displayed on page

        $.each(card, function(i) { // loop through array of results
						displayCards.push(card[i]); // add to array
				}); //loop


				for (c = 0; c < displayCards.length; c++) { // setting variables and building divs to be added to homepage
					var cardName = displayCards[c].name;
					var cardImage = displayCards[c].imageUrl;
					var cardArtist = displayCards[c].artist;
					var cardSet = displayCards[c].setName;
					var cardId = displayCards[c].id;
					var cardColors = displayCards[c].colors;
					var originalType = displayCards[c].originalType;
					$directory.append( //create html for results, insert into container div
						'<div class="magic-card color-' + cardColors + '">' + '<div class="magic-card-content-wrap" style="background-image:url(' + cardImage + ');"></div>' + '<div class="magic-card-content">' + '<div class="card-name">' + cardName + '</div>' + '<div class="original-type">' + originalType + '</div>' + '<div class="card-set">' + cardSet + "<br>" + '</div>' + '<div class="card-artist">Artist: ' + cardArtist + '</div>' + '</div></div>'); //create html for results, insert into container div
				};

        if (displayCards.length == 0 ) { // if no results are in array
          $directory.append( //create html for NO results, insert into container div
            '<div class="sorry">Sorry, No Results Can Be Found.<br>Please Try Again</div>'
        );

        }
        $("#jump-to-page").addClass("show-jump"); // reveal jump navigation


			});
			hideSpinner();
		}
	});
};





//anonymous funcitons
$(document).ready(function() { // menu & form toggels
  	$("#nav-icon3").click(function() {
  		$(this).toggleClass("open");
  		$("#form-filters").toggleClass("open-filters");
  	});


    $("#pageselect").keyup(function(event) { //jump to page
        if (event.keyCode === 13) {
          $("#directory").empty();
          var newpagenumber = $(this).val();
          pageNumber = newpagenumber;
          getResults(pageNumber, 20);
        }
    });

    $("#jump").click(function() {
      $("#directory").empty();
      var newpagenumber = $("#pageselect").val();
      pageNumber = newpagenumber;
      getResults(pageNumber, 20);
    });

});




//infinite scroll
window.onscroll = function(ev) {
	if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
		pageNumber++;
		getResults(pageNumber, 20);
	}
};
