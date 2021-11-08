$(document).ready(function()
	{
		$('#C_submit').click(function(e)
			{
				if($('#C_user').val()=="")
				{
					e.preventDefault();
					$('#C_user').focus();
				}
				 else if($('#mdp').val()=="")
				{
					e.preventDefault();
					$('#mdp').focus();
				}		
			});

		$('#i_submit').click(function(e)
			{
				var input = [ 'i_user', 'i_mail', 'i_mdp', 'i_mdp_confirm' ];
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
				if($('#i_mdp_confirm').val()!=$('#i_mdp').val())
				{
					e.preventDefault();
					$('#i_mdp_confirm').focus();
				}
				
			});
		$('#i_mdp_confirm').keyup(function()
		{
			if($('#i_mdp_confirm').val()!=$('#i_mdp').val())
			{
				$('#i_mdp_confirm').css({
					boxShadow:   'red 0 0 8px',
				});	
			}
			else
			{
				$('#i_mdp_confirm').css({
					boxShadow:  'green 0 0 8px',
				});
			}	
		});
		$('#i_mdp_confirm').blur(function()
		{
			if($('#i_mdp_confirm').val()!=$('#i_mdp').val())
			{
				$('#i_mdp_confirm').css({
					boxShadow:   'red 0 0 8px',
				});	
			}
			else
			{
				$('#i_mdp_confirm').css({
					boxShadow:   'none',
				});	
			}

		});
	});



/*$('.AC_Me_box1b').css({
					overflow: 'visible',  
				});*/