// Easy autocomplete for search input from: http://easyautocomplete.com/
window.onunload = function () {
			debugger;
		}
		var options = {
			url: "json/partimedlem.json",

			getValue: "title",
			template: {
				type: "description",
				fields: {
					description: "twitterhandle"
				}
			},
			template: {
				type: "description",
				fields: {
					description: "twitterhandle"
				}
			},

			list: {
				match: {
					enabled: true
				},
				// After searching for the name of the politician, the next input is changed into the twitterhandle. Search can only handle either 
				// twitterhandle or hashtag, not name
				onSelectItemEvent: function () {
					var value = $( "#function-data" ).getSelectedItemData().twitterhandle;
					$( "#data-holder" ).val( value ).trigger( "change" );
				}
			}
		};

		$( "#function-data" ).easyAutocomplete( options );