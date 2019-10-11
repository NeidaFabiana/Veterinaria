	$(window).load( function() {

				$('#mycalendar').monthly({
					mode: 'event',
					//jsonUrl: 'events.json',
					//dataType: 'json'
					xmlUrl: 'events.xml'
				});

				$('#mycalendar2').monthly({
					mode: 'picker',
					target: '#mytarget',
					setWidth: '300px',
					startHidden: true,
					showTrigger: '#mytarget',
					stylePast: true,
					disablePast: true
				});

			

			});