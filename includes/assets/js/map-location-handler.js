function map_location() {
    jQuery(document).ready(function($) {
            mapboxgl.accessToken = 'pk.eyJ1IjoiYmFzaGFyMDA5MSIsImEiOiJjbGtiaGhlbDQwZXoxM2dvYmswaTR2aDc4In0.HlCLwsqv_6s2bs0dvZwUeA';

            const locationInputs = $('.estimated_location_map');
            const distanceResult = $('#distance-result');

            function calculateDistance(coord1, coord2) {
                const lon1 = coord1[0];
                const lat1 = coord1[1];
                const lon2 = coord2[0];
                const lat2 = coord2[1];

                const R = 6371; // Earth's radius in kilometers
                const φ1 = lat1 * Math.PI / 180;
                const φ2 = lat2 * Math.PI / 180;
                const Δφ = (lat2 - lat1) * Math.PI / 180;
                const Δλ = (lon2 - lon1) * Math.PI / 180;

                const a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
                    Math.cos(φ1) * Math.cos(φ2) *
                    Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

                return (R * c).toFixed(2); // Distance in kilometers, rounded to 2 decimal places
            }

            function updateDistance() {
                const locations = locationInputs.map(function() {
                    return $(this).val();
                }).get();

                const areAllLocationsFilled = locations.every(function(location) {
                    return location.trim() !== '';
                });

                if (areAllLocationsFilled) {
                    const geocodingPromises = locations.map(function(location) {
                        const geocodingAPI = `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(location)}.json?access_token=${mapboxgl.accessToken}`;
                        return $.getJSON(geocodingAPI);
                    });

                    $.when.apply($, geocodingPromises)
                        .then(function() {
                            const coordinates = Array.from(arguments).map(function(data) {
                                return data[0].features[0].center;
                            });

                            const totalDistance = coordinates.reduce(function(total, coord, index) {
                                if (index === 0) return 0;
                                const prevCoord = coordinates[index - 1];
                                return total + parseFloat(calculateDistance(prevCoord, coord));
                            }, 0);

                            distanceResult.val(`${totalDistance.toFixed(2)}`);
                        })
                        .fail(function(error) {
                            console.error('Error:', error);
                            distanceResult.val('Error calculating distance');
                        });
                } else {
                    distanceResult.val('Enter all locations');
                }
            }

            locationInputs.on('focus input', function() {
                updateDistance();
                const inputElement = $(this);
                geocodeLocation(inputElement);
            });

            function geocodeLocation(inputElement) {
                const location = inputElement.val();
                const geocodingAPI = `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(location)}.json?access_token=${mapboxgl.accessToken}`;

                $.getJSON(geocodingAPI)
                    .done(function(data) {
                        const suggestions = data.features.map(function(feature) {
                            return feature.place_name;
                        });
                        showAutocompleteSuggestions(inputElement, suggestions);
                    })
                    .fail(function(error) {
                        console.error('Error:', error);
                    });
            }

            function showAutocompleteSuggestions(inputElement, suggestions) {
                const autocompleteList = $('<ul>').html('');

                suggestions.forEach(function(suggestion) {
                    const li = $('<li>').text(suggestion);
                    li.on('click', function() {
                        inputElement.val(suggestion);
                        autocompleteList.html('');
                        updateDistance();
                    });
                    autocompleteList.append(li);
                });

                $('.estimated_location_dropdown ul').remove();
                $('.estimated_input_wrapper.active + .estimated_location_dropdown').append(autocompleteList)
            }
    });
} 
map_location();