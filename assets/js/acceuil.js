
$(document).ready(function()
	{
		$('#fo_send_bt').click(function(e)
		{
			var input = [ 'T_nom', 'T_etat', 'T_desc', 'jour', 'heure' ];
				var i;
				for (i = 0; i < input.length; ++i)
				{
					if($('#'+input[i]).val()=="")
					{
						e.preventDefault();
						$('#'+input[i]).focus();
						break;
					}	
				}
		});

		$('#fo_reset_bt').click(function()
		{
			$('.fo_form_forum').css({
					display:   'none',
				});
		});
		$('.new_tache').click(function()
		{
			$('.fo_form_forum').css({
					display:   'block',
				});
			$('#T_nom').focus();
		});

		$('#off').click(function(e)
		{
			e.preventDefault();
			$.ajax(
			{
		        url: "modeles/ajax.php",
		        data:'idUser='+ $('#id_U').val(),
		        type: "POST",
		        success: function(msg)
		        {
		       		console.log(msg);
		       		window.location = 'index.php?module=deconnexion';	
		        },
		        error: function(msg)
		        {
		       		 alert('Erreur');
		        },
			});

			

		});
		$('#hist').click(function(e)
		{
			e.preventDefault();
			$('.fo_search').css({
					display:   'block',
				});
			$('#search').focus();

		});
		
});
function set(id,action)
{

	if(action=='1')
	{
		action='En cours';
	}
	else
	{
		action='Terminé';
	}
     $.ajax(
     {
        url: "modeles/ajax.php",
        data:'id_T='+id+'&action='+action,
        type: "POST",
        success: function(msg)
        	{
        		console.log(msg);
        		window.location.reload();
            },
        error: function(msg)
        {
       		 alert('Erreur');
        },
    });
}