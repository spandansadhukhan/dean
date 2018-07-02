<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<link href="http://107.170.152.166/team2/escort/css/new-tab.css" rel="stylesheet">
<script src="http://107.170.152.166/team2/escort/js/new-tab2.js" type="text/javascript"></script>
<script src="http://107.170.152.166/team2/escort/js/new.js" type="text/javascript"></script>
<script type="text/javascript" src="http://107.170.152.166/team2/escort/js/location.js"></script>
<link rel="stylesheet" href="http://107.170.152.166/team2/escort/css/datepicker.css"/>
<script src="http://107.170.152.166/team2/escort/css/datepicker.js"></script>
<script type="text/javascript">
$(function() {
	// var start_date = $('input[name^=start_date]').val();
  $( "input[name^=event_date]" ).datepicker(
  {
	minDate: 0,
	changeMonth: true,
	changeYear: true,
	dateFormat: "yy/mm/dd" },
	{maxDate: '0'});
});
</script>
<script type="text/javascript">
var task		=	'Add';

$(document).ready(function() {
	$(document).on("click", ".z-tabs-nav li#tab2", function (event) {
		if(task == 'Add')
		{
			setTimeout(function(){ initialize(); }, 300);
		}
	});
});
function deleteAd(id)
{
	BootstrapDialog.confirm('Are you sure to delete this event?', function(result){
	if (result)
	{
		var siteurl="#";
		var posturl=siteurl+'manage-event/doTask/Delete/'+id;
		$.ajax({
		url: posturl,
		dataType: 'json',
		type: "GET",
		beforeSend: function(){
				 $('#wait-div').show();
				},
	  success: function(data){
	  $('#wait-div').hide();
		 if(data.success_message)
		  {
				$("#add_"+id).hide('slow').remove();
				 $("#success").show('slow');
				 $("#success").html(data.success_message);
				$("#success").fadeOut('slow');
		  }
	  },
	  error: function (data) {
		 alert("Server Error.");
		 return false;
	  }
	});

	}
	});
	return false;

}

function activeInactive(task,id)
{
	BootstrapDialog.confirm('Are you sure to '+task+' this event?', function(result){
	if (result)
	{
		var siteurl="#";
		var posturl=siteurl+'manage-event/doTask/'+task+'/'+id;
		$.ajax({
		url: posturl,
		dataType: 'json',
		type: "GET",
		beforeSend: function(){
				 $('#wait-div').show();
				},
	  success: function(data){
	  $('#wait-div').hide();
		 if(data.success_message)
		  {
				$("#class_"+id).removeClass('fa fa-times').removeClass('fa fa-check-square');

				$("#success").show('slow');
				$("#success").html(data.success_message);
				$("#success").fadeOut('slow');
				if(task=='Active')
				{
					$("#status_"+id).attr('onclick',"activeInactive('Inactive',"+id+")");
					$("#status_"+id).attr('data-tool',"Inactive");
					$("#class_"+id).addClass('fa fa-times');
				}
				else
				{
					$("#status_"+id).attr('onclick',"activeInactive('Active',"+id+")");
					$("#status_"+id).attr('data-tool',"Active");
					$("#class_"+id).addClass('fa fa-check-square');
				}
		  }
	  },
	  error: function (data) {
		 alert("Server Error.");
		 return false;
	  }
	});

	}
	});
	return false;

}

</script>
<section id="wrapper">
  <section id="middle">
    <section id="middle-inner">
      <section class="all-pins-do">
        <div class="my-account-inner">
          <div class="sb-toggle-right navbar-right">
            <div class="navicon-line"></div>
            <div class="navicon-line"></div>
            <div class="navicon-line"></div>
          </div>
          <div class="left-my-account-menu-m">
                                                <div class="triangleBottomRight firstItem"></div>
                                                <style>
                                                    .unreadCount {
                                                        background: linear-gradient(to bottom, #fdf6ca 0%, #fdf6ca 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
                                                        border-radius: 50%;
                                                        color: #620c29;
                                                        display: inline-block;
                                                        font-family: arial;
                                                        font-size: 12px;
                                                        font-weight: bold;
                                                        height: 20px;
                                                        line-height: 20px;
                                                        text-align: center;
                                                        width: 20px;
                                                        vertical-align:sub;
                                                    }
                                                </style>
                                                <a style="display:none;" href="#;" class="website_activate"></a>
                                                    <?php echo $this->element('agent_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
          <div class="right-my-account">
            <div class="right-my-account-blocks">
              <div class="detail-heading">
                <section class="title-left">
                  <h1 style="display:inline-block;">Manage Events</h1>
                </section>
                <div class="clr"></div>
              </div>
              <div class="right-my-account-blocks-inner">
                            <div class="smart-forms">
                  		 
                  		 
                  		 
                  		 <div class="table-responsive for-msg">
                            <div id="countp" style="display:none">0</div><table class="table table-vcenter table-striped">
                            <thead>
                            <tr><th>Location</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Phone Number</th>
                            <th>Option</th>
                            </tr></thead>
                                <tbody>
																		
                                   </tbody>
                                    <tbody><tr id="no-record">
									   <td class="no-record" colspan="7">No Record Found</td>
									 </tr>
                            </tbody></table>
                        </div>
                  		 
                  		 
                </div>
                            <div class="clr"></div>
            </div>
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
        </div>
      </section>
      <!--<div id="promo-bottom">

 </div>-->
    </section>
  </section>
</section>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    }
  });
}

function updateMarkerStatus(str) {
  //document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
	$('#lat').val(latLng.lat());
	$('#lng').val(latLng.lng());
}

function updateMarkerAddress(str) {

  $('#currentlocation').val(str);

}

var task = "Add";
if(task == 'Edit')
{
	"";
	var late = '';
	var lang = '';
}
else
{
	var late = 51.5000;
	var lang = 0.1167;
}

function initialize() {

		var latLng = new google.maps.LatLng(late,lang);
        var mapOptions = {
          center: latLng,
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('mapCanvas'),
          mapOptions);

        var input = document.getElementById('currentlocation');

        var autocomplete = new google.maps.places.Autocomplete(input);

        //autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
		  position: latLng,
          title: '',
          map: map,
          draggable: true
        });
         updateMarkerPosition(latLng);
         geocodePosition(latLng);

  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });

  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });

  google.maps.event.addListener(marker, 'dragend', function() {

    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(10);  // Why 17? Because it looks good.
          }

          var image = new google.maps.MarkerImage(
              place.icon,
              new google.maps.Size(71, 71),
              new google.maps.Point(0, 0),
              new google.maps.Point(17, 34),
              new google.maps.Size(35, 35));
          marker.setIcon(image);
          marker.setPosition(place.geometry.location);
           updateMarkerPosition(place.geometry.location);
       //  geocodePosition(place.geometry.location);
          var address = '';


         // infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        //  infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          google.maps.event.addDomListener(radioButton, 'click', function() {
            autocomplete.setTypes(types);
          });
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script></div>

<div class="col-right">
  <?php echo $this->element("user_banner");?>    
</div>
</section>
<div class="clr"></div>