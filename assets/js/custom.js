document.addEventListener('mouseover', function(evt) {
	if(evt.target.tagName == 'P') {
		var elem = evt.target.querySelector('.describe');
		
		if(elem) {
			elem.classList.remove('hide');
		}
	}
});
document.addEventListener('mouseout', function(evt) {
	if(evt.target.tagName == 'P') {
		var elem = evt.target.querySelector('.describe');
		
		if(elem) {
			elem.classList.add('hide');
		}
	}
});