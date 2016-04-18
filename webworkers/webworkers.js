var first = document.querySelector('#arg1');
var second = document.querySelector('#arg2');
var button = document.querySelector('#button');
var wynik = document.querySelector('.wynik');

if (window.Worker) 
{
	var myWorker = new Worker("worker.js");

	button.onclick=function() 
	{
		myWorker.postMessage([first.value,second.value]); 
		console.log('Wys³ano do worker.js');
	}

	myWorker.onmessage = function(e) 
	{
		wynik.textContent = e.data;
		console.log('Odebrano od worker.js');
	};
}
