if($('body').hasClass('index')) {} else {
	   	var localizeMemory;
		if(readCookie('ddlweather')){
			var cookieDate = readCookie('ddlweather').split('|');

			localizeMemory = cookieDate[0];
			$('body').addClass(cookieDate[0]);

			$('#degreesCelsius .number').text(cookieDate[1]);
			$('#degreesCelsius .cel').text("°C ");

			$('#location').text(cookieDate[2]);//local
		} else {
			//getWeather("./weather.php");
			var profileLatitude = $('#browser_geo').data('latitude');
			var profileLongitude = $('#browser_geo').data('longitude');
			getWeather("http://api.openweathermap.org/data/2.5/weather?lat="+profileLatitude+"&lon="+profileLongitude);
		}

	   function getWeather(link) {
	   		$.getJSON(link, function(data){
			//console.log(data);

			//set weather id & icon 
			var id = data.weather[0].id;
			var icon = data.weather[0].icon;

			//$('#weather-id').text(id);//<div id="weather-id"></div>
			//$('#weather-icon').text(icon);//<div id="weather-icon"> </div>

			//TESTING 
			//icon = "01n";
			//change such doge and sky based on much icon
			//var doge_img = "url(./img/doge/" + icon + ".png)";
			//$('.doge-image').css('background-image', doge_img);//<div class="doge-image"></div>

			//var sky_img = "url(./img/sky-img/" + icon + ".png)";
			//$('.bg').css('background-image', sky_img);
			if(localizeMemory==null){
				localizeMemory = 'clima-'+icon;
			} else {
				$('body').removeClass(localizeMemory);
			}
			$('body').addClass('clima-'+icon);
			//http://openweathermap.org/wiki/API/Weather_Condition_Codes
			//http://openweathermap.org/img/w/10d.png
			/*01d.png	 01n.png	 sky is clear
			02d.png	 02n.png	 few clouds
			03d.png	 03n.png	 scattered clouds
			04d.png	 04n.png	 broken clouds
			09d.png	 09n.png	 shower rain
			10d.png	 10n.png	 Rain
			11d.png	 11n.png	 Thunderstorm
			13d.png	 13n.png	 snow
			50d.png	 50n.png	 mist*/

			//console.log(icon);

			//get weather description
			var tempCelcius = data.main.temp - 273.15;
			var tempFahrenheit = tempCelcius * 9 / 5 + 32;
			var description = data.weather[0].description;

			//$('#weather-desc').text(description);//<div id="weather-desc"></div>
			//$('#location').text(data.name);//local
			$('#location').text($('#browser_geo').data('cidade'));

			$('#degreesCelsius .number').text(Math.round(tempCelcius));
			$('#degreesCelsius .cel').text("°C ");
			//$('#degreesFahrenheit').text(Math.round(tempFahrenheit) + "°F");//<div class="t" id="degreesFahrenheit"></div>
			//cookies
			var theWeather = 'clima-'+icon+'|'+Math.round(tempCelcius)+'|'+$('#browser_geo').data('cidade');
			createCookie('ddlweather', theWeather,0.02);
		});
	   }

	   	/*$("#browser_geo" ).one('click', function(){
	   		getLocation();

  			 function getLocation()
			  {
			  if (navigator.geolocation)
			    {
			    navigator.geolocation.getCurrentPosition(showPosition);
			    }
			  else
			  	$("#browser_geo").text("Geolocation não está disponível para o seu navegador.");
			  }
			function showPosition(position)
			  {
			  //$("#browser_geo").text("Latitude: " + position.coords.latitude + 
			  //"Longitude: " + position.coords.longitude);

			  	var url = 'http://api.openweathermap.org/data/2.5/weather';
                url += '?lat=' + position.coords.latitude + '&lon=' + position.coords.longitude + '&callback=?';

                getWeather(url);
                $("#browser_geo").text("Localizado!").css("cursor", "auto").css("color", "#FF5CFF");
			  }
			});*/
}