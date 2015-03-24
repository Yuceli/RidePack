"use strict"
var googlePlaces = {

    inputPlaceID : null,

    outputCity: null,
    outputState: null,
    outputCountry: null,

    options: {
      types: ['(cities)']
    },

    initAutocomplete : function(inputSearch){
        if(!inputSearch || inputSearch.nodeName != 'INPUT'){
            console.error('initAutocomplete needs an input element as first param.');
            return;
        }

        var autocomplete = new google.maps.places.Autocomplete(inputSearch, this.options);

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();

            googlePlaces.displayPlaceDetails(place);
        });
    },

    displayPlaceDetails : function(place){
        if(!this.outputCity && !this.outputState && !this.outputCountry){
            console.error('Define an output with googlePlaces.outputCity, googlePlaces.outputState and/or googlePlaces.outputCountry');
        }

        if(this.outputCity){
            if(this.outputCity.nodeName=='INPUT'){
                this.outputCity.value = this.getAddressElement('locality',place.address_components);
             } else {
                this.outputCity.innerHTML = this.getAddressElement('locality',place.address_components);
             }
        }

        if(this.outputState){
            if(this.outputState.nodeName=='INPUT'){
                this.outputState.value = this.getAddressElement('administrative_area_level_1',place.address_components);
             } else {
                this.outputState.innerHTML = this.getAddressElement('administrative_area_level_1',place.address_components);
             }
        }

        if(this.outputCountry){
            if(this.outputCountry.nodeName=='INPUT'){
                this.outputCountry.value = this.getAddressElement('country',place.address_components);
             } else {
                this.outputCountry.innerHTML = this.getAddressElement('country',place.address_components);
             }
        }

        if(this.inputPlaceID && this.inputPlaceID.nodeName == 'INPUT'){
            this.inputPlaceID.value = place.place_id;
        }
        
    },

    getAddressElement : function(type, aAddress){
        var sAddressElement = '';

        if(!aAddress) return sAddressElement;

        for(var i=0; i<aAddress.length; i++){
            var typesLength = aAddress[i].types.length;
            for(var j=0; j<typesLength; j++){
                if(aAddress[i] && aAddress[i].types[j] == type){
                    sAddressElement = aAddress[i].long_name;
                }
            }
        }

        return sAddressElement;
    },

    getPlaceDetails : function(){
        if(!this.inputPlaceID || this.inputPlaceID.nodeName != 'INPUT'){
            console.error('getPlaceDetails needs to define googlePlaces.inputPlaceID with an input element.');
            return;
        }

        if(this.inputPlaceID.value){
            var request = {
                placeId: this.inputPlaceID.value
            };

            var oDvMap = document.createElement('div');
            var service = new google.maps.places.PlacesService(oDvMap);
            service.getDetails(request, this.showPlaceDetails);
        }
        else{
            this.displayPlaceDetails({});
        }
    },

    showPlaceDetails : function (place, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            googlePlaces.displayPlaceDetails(place);
        }else{
            googlePlaces.displayPlaceDetails({});
        }
    }
};






