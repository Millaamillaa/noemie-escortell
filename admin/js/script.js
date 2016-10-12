$( function() {
    $("#datepicker").datepicker({
    	changeMonth: true,
     	changeYear: true,
		yearRange: "1970:",
     	showAnim: "slideDown",
     	altField: "#actualDate",
     	altFormat: "dd/mm/yy",
     	autoSize: true,
     	dateFormat: "dd/mm/yy",
     	dayNames: [ "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ],
     	dayNamesMin: [ "Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam" ],
     	dayNamesShort: [ "Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam" ],
  		monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
     	monthNamesMin: [ "Ja", "Fé", "Ma", "Av", "Mai", "Jun", "Jui", "Août", "Se", "Oc", "No", "Dé" ],
     	monthNamesShort: [ "Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "Jui", "Aoû", "Sep", "Oct", "Nov", "Déc" ]
}); 
})