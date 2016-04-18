
var result;
onmessage = function(e) 
{
	console.log('Wczytano dane');
	result=e.data[0];
	for(var i=1;i<e.data[1];i++)
		{
			result*=e.data[0];
		}
	var workerResult = 'Result: ' + result;
	console.log('Wysłanie danych');
	postMessage(workerResult);
}