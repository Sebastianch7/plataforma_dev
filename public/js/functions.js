$( document ).ready(function() {
    $('#departament').change(function()
    {
    	showCities($(this).val());
    });
});

function showCities(data)
{
	$.ajax({
  	url: 'selectcity',
  	method: 'POST',
      data: {departament: data, _token: $('input[name="_token"]').val()},
		}).done(function(data) {
    	console.log();
			lista = '';
  	 	for(i=0;i<data.length;)
    	{
    		lista += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
    		i++;
    	}
    	$('#city').html(lista);
		});
}