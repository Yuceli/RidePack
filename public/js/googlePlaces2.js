"use strict"
function googlePlaces () {

    this.inputPlaceID = null;

    this.outputCity = null;
    this.outputState= null;
    this.outputCountry= null;

    this.options= {
      types: ['(cities)']
    };

    this.autocomplete = null;

    this.initAutocomplete = function(inputSearch){
        if(!inputSearch || inputSearch.nodeName != 'INPUT'){
            console.error('initAutocomplete needs an input element as first param.');
            return;
        }

        this.autocomplete = new google.maps.places.Autocomplete(inputSearch, this.options);

        google.maps.event.addListener(this.autocomplete, 'place_changed', this.displaySearch);
    };

    this.displayPlaceDetails = function(place){
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

        if(this.inputPlaceID && this.inputPlaceID.nodeName == 'INPUT' && place.place_id){
            this.inputPlaceID.value = place.place_id;
        }
        
    };

    this.getAddressElement = function(type, aAddress){
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
    };

    this.getPlaceDetails = function(){
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
    };

    
}






